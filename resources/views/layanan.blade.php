@extends('layout.app')

@section('title')
    Single Tabel
@endsection
@section('content')
    <div class="card card-round">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title">Layanan</div>
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
                            <th scope="col">Nama Item</th>
                            <th scope="col">Gambar Item</th>
                            <th scope="col">Jenis Layanan</th>
                            <th scope="col">Unit</th>
                            <th scope="col">category_id</th>
                            <th scope="col">Harga</th>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="thumbnail" class="col-sm-4 col-form-label">Gambar
                                Layanan</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail"
                                    placeholder="Masukkan gambar Layanan">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_layanan" class="col-sm-4 col-form-label">Nama Item</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_layanan" name="nama_layanan"
                                    placeholder="Masukkan Nama Item ">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis_layanan" class="col-sm-4 col-form-label">Jenis Layanan</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="jenis_layanan" name="jenis_layanan">
                                    <option value="">Pilih Jenis Layanan</option>
                                    <option value="1">Reguler</option>
                                    <option value="2">Kilat</option>
                                    <option value="3">Express</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="unit" class="col-sm-4 col-form-label">Unit</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="unit" name="unit">
                                    <option value="">Pilih Unit</option>
                                    <option value="1">Kg</option>
                                    <option value="2">Pcs</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="category_id" class="col-sm-4 col-form-label">category</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="category_id" name="category_id">
                                    <option value="">Pilih category</option>
                                    @foreach ($categorys as $item)
                                        <option value="{{ $item->id_categori }}">{{ $item->nama_rak }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="harga" name="harga"
                                    placeholder="Masukkan Harga">
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
        // new DataTable('#example');
        $(document).ready(function() {
            // Enum mappings
            const jenisLayananMapping = {
                1: 'Reguler',
                2: 'Kilat',
                3: 'Express'
            };

            const unitMapping = {
                1: 'Kg',
                2: 'Pcs'
            };

            $('#example').DataTable({
                ajax: {
                    url: 'http://127.0.0.1:8000/api/layanans', // Your API endpoint
                    dataSrc: ''
                },
                columns: [{
                        "data": null,
                        "render": function(data, type, row, index) {
                            return index.row + 1; // Auto numbering
                        }
                    },
                    {
                        "data": "nama_layanan" // Display service name directly
                    },
                    {
                        "data": "thumbnail",
                        "render": function(data) {
                            return `<img src="/storage/${data}" width="50" height="50">`; // Thumbnail image
                        }
                    },
                    {
                        "data": "jenis_layanan",
                        "render": function(data) {
                            return jenisLayananMapping[data] || 'N/A'; // Map to readable name
                        }
                    },
                    {
                        "data": "unit",
                        "render": function(data) {
                            return unitMapping[data] || 'N/A'; // Map to readable name
                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return row.category ? row.category.nama_kategori :
                                'N/A'; // Display category name
                        }
                    },
                    {
                        "data": "harga" // Display price
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return `
                                <td>
                                    <a href="#" class="btn btn-label-success btn-round btn-sm me-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-jenis="Ubah" data-bs-id="${row.id}">
                                        <span class="btn-label"><i class="fa fa-pen"></i></span> Edit
                                    </a>
                                    <a href="#" class="btn btn-label-danger btn-round btn-sm" onclick="hapusData(${row.id})">
                                        <span class="btn-label"><i class="fa fa-trash"></i></span> Hapus
                                    </a>
                                </td>
                    `;
                        }
                    }
                ]
            });
        });


        //const data tidak bisa diubah  dan let bisa diubah 
        // Event listener untuk membuka modal

        const targetModal = document.getElementById('exampleModal');
        let setIdlayanan = null; // Inisialisasi ID tim

        if (targetModal) {
            targetModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget; // Tombol yang memicu modal
                const jenisModal = button.getAttribute('data-bs-jenis'); // Ambil jenis modal
                setIdlayanan = button.getAttribute('data-bs-id'); // Ambil ID tim jika ada

                // Jika jenis modal adalah "Ubah", ambil data tim untuk diedit
                if (jenisModal === "Ubah") {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/layanans/' +
                            setIdlayanan, // Menggunakan endpoint show
                        method: 'GET',
                        success: function(data) {
                            $('#nama_layanan').val(data.data.nama_layanan);
                            $('#jenis_layanan').val(data.data.jenis_layanan);
                            $('#unit').val(data.data.unit);
                            $('#harga').val(data.data.harga);
                            $('#category_id').val(data.data.category_id);

                            $('#pr_thumbnail').remove();
                            if (data.data.thumbnail) {
                                $('#thumbnail').after(
                                    `<div id="pr_thumbnail"><img src="/storage/${data.data.thumbnail}" width="30px">`
                                );
                            }

                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching data for edit:', error);
                        }
                    });
                } else {
                    // Kosongkan input saat menambah data baru
                    $('#thumbnail').val('');
                    $('#unit').val('');
                    $('#harga').val('');
                    $('#nama_layanan').val('');
                    $('#jenis_layanan').val('');
                    $('#category_id').val('');
                    setIdlayanan = null; // Reset ID tim

                    $('#pr_gambar_tim').remove();

                }

                // Update judul modal
                const modalTitle = targetModal.querySelector('.modal-title');
                modalTitle.textContent = `${jenisModal} Layanan`;
            });
        }

        // Submit form untuk tambah dan ubah
        $("#dataForm").submit(function(event) {
            event.preventDefault();
            let formData = new FormData(this);
            let sendData = 'http://127.0.0.1:8000/api/layanans/';
            let setMethod = 'POST'; // Default method adalah POST

            // Jika ada ID, gunakan PUT untuk update
            if (setIdlayanan) {
                sendData += setIdlayanan;
                setMethod =
                    'POST'; // Method harus tetap POST karena Anda menggunakan _method untuk menyimulasikan PUT
                formData.append('_method', 'PUT');
            }

            // Kirim data ke server
            $.ajax({
                url: sendData,
                method: setMethod,
                data: formData,
                contentType: false, // Pastikan untuk tidak mengatur konten tipe
                processData: false, // Pastikan untuk tidak memproses data
                success: function(response) {
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
                error: function(xhr, status, error) {
                    console.error('Error saving data:', error);
                    Swal.fire({
                        title: "Gagal!",
                        text: "Terjadi kesalahan saat menyimpan data: " + xhr.responseJSON
                            .pesan,
                        icon: "error"
                    });
                }
            });
        });



        function hapusData(id) {
            Swal.fire({
                title: "Bener Mau Hapus Dia?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/layanans/' + id,
                        method: 'DELETE',
                        success: function(data) {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success",
                                timer: 2000, //timer dalam Milidetik (2000 ms = 2 detik)
                                timerProgressBar: true, //menampilkan progress bar pada SweetAlert
                                didClose: () => {
                                    location
                                        .reload(); //merefresh halaman setelah SweetAlert ditutup
                                }
                            })
                        }
                    });


                }
            });
        }
    </script>
@endsection
