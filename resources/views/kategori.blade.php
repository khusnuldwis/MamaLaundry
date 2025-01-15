@extends('layout.app')

@section('title')
    Single Tabel
@endsection

@section('content')
    <div class="card card-round">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title">Kategori</div>
                <div class="card-tools">
                    <div class="ms-md-auto py-2 py-md-0 float-end">
                        <a href="#" class="btn btn-primary btn-round" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-jenis="Tambah">Tambah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="container">
                <table class="table table-sm table-bordered" id="example">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <form id="dataForm">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="jenis_kategori" class="col-sm-4 col-form-label">Nama Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jenis_kategori" name="jenis_kategori"
                                    placeholder="Masukkan Nama Kategori" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ url('dist/js/jquery1.js') }}"></script>
    <script src="{{ url('dist/js/Tables.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function () {
            // Inisialisasi DataTable
            $('#example').DataTable({
                ajax: {
                    url: 'http://127.0.0.1:8000/api/categorys', // URL API untuk mendapatkan data
                    dataSrc: ''
                },
                columns: [{
                        "data": null,
                        "render": function (data, type, row, index) {
                            return index.row + 1;
                        }
                    },
                    {
                        "data": "jenis_kategori"
                    },
                    {
                        "data": null,
                        "render": function (data, type, row) {
                            return `
                                <a href="#" class="btn btn-label-success btn-round btn-sm me-2" 
                                   data-bs-toggle="modal" data-bs-target="#exampleModal" 
                                   data-bs-jenis="Ubah" data-bs-id="${row.id}">
                                    <span class="btn-label"><i class="fa fa-pen"></i></span> Edit
                                </a>
                               <a href="#" class="btn btn-label-danger btn-round btn-sm" 
                                    onclick="hapusData(${row.id})">
                                        <span class="btn-label"><i class="fa fa-trash"></i></span> Hapus
                                    </a>`;
                        }
                    }
                ]
            });

            const targetModal = document.getElementById('exampleModal');
            let setIdKategori = null;

            if (targetModal) {
                targetModal.addEventListener('show.bs.modal', event => {
                    const button = event.relatedTarget; // Tombol yang memicu modal
                    const jenisModal = button.getAttribute('data-bs-jenis'); // Jenis modal (Tambah/Ubah)
                    setIdKategori = button.getAttribute('data-bs-id'); // ID kategori untuk edit (jika ada)

                    // Jika jenis modal adalah "Ubah", ambil data kategori berdasarkan ID
                    if (jenisModal === "Ubah" && setIdKategori) {
                        $.ajax({
                            url: `http://127.0.0.1:8000/api/categorys/${setIdKategori}`, // Endpoint API untuk detail kategori
                            method: 'GET',
                            success: function (response) {
                                if (response.data) {
                                    // Isi form dengan data yang sudah ada
                                    $('#jenis_kategori').val(response.data.jenis_kategori);
                                }
                            },
                            error: function (xhr, status, error) {
                                console.error('Error fetching data for edit:', error);
                            }
                        });
                    } else {
                        // Reset form jika modal untuk tambah
                        $('#jenis_kategori').val('');
                        setIdKategori = null; // Reset ID kategori
                    }

                    // Ubah judul modal berdasarkan jenis modal
                    const modalTitle = targetModal.querySelector('.modal-title');
                    modalTitle.textContent = `${jenisModal} Kategori`;
                });
            }

            // Submit form untuk tambah/ubah
            $("#dataForm").submit(function (event) {
                event.preventDefault();

                let formData = new FormData(this);
                let url = 'http://127.0.0.1:8000/api/categorys';
                let method = 'POST';

                if (setIdKategori) {
                    url += `/${setIdKategori}`;
                    formData.append('_method', 'PUT');
                }

                $.ajax({
                    url: url,
                    method: method,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        Swal.fire({
                            title: "Sukses!",
                            text: response.pesan || "Data berhasil disimpan.",
                            icon: "success",
                            timer: 2000,
                            timerProgressBar: true,
                            didClose: () => {
                                location.reload(); // Refresh DataTable
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error('Error saving data:', error);
                        Swal.fire({
                            title: "Gagal!",
                            text: "Terjadi kesalahan saat menyimpan data.",
                            icon: "error"
                        });
                    }
                });
            });

            // Fungsi hapus data
            function hapusData(id) {
            Swal.fire({
                title: "Yakin Dihapus",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/categorys/' + id,
                        method: 'DELETE',
                        success: function(data) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success",
                                timer: 2000, 
                                timerProgressBar: true, 
                                didClose: () => {
                                    location.reload(); // Reload the page after success
                                }
                            })
                        }
                    });
                }
            });
        
}

        });
    </script>
@endsection
