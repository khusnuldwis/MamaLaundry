@extends('layout.app')

@section('title', 'Data Orderan')

@section('content')
<div class="row">
<div class="card card-round">
    <div class="card-header">
        <div class="card-head-row">
            <div class="card-title">Data Pesanan</div>
            <div class="card-tools">
                <div class="ms-md-auto py-2 py-md-0 float-end">
                    
                    <a href="#" class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#addLayananModal">Add Layanan</a>

                    <!-- Add Layanan Modal -->
                    <div class="modal fade" id="addLayananModal" tabindex="-1" aria-labelledby="addLayananModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addLayananModalLabel">Add Layanan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label for="category_id" class="col-sm-4 col-form-label">Kategori</label>
                                            <div class="col-sm-8">
                                                <select class="form-select" id="category_id" name="category_id">
                                                    <option value="">Pilih Categori</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_layanan" class="form-label">Nama Layanan</label>
                                            <input type="text" class="form-control" name="nama_layanan" id="nama_layanan">
                                        </div>
                                        <div class="mb-3">
                                            <label for="unit" class="form-label">Berat</label>
                                            <select class="form-control" id="unit" name="unit">
                                                <option value="" selected disabled>Select Unit</option>
                                                <option value="1">Kg</option>
                                                <option value="2">Pcs</option>
                                            </select>
                                        </div>
                
                                        
                                        <div class="mb-3">
                                            <label for="harga" class="form-label">Harga</label>
                                            <input type="number" class="form-control" name="harga" id="harga">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Add Layanan Modal -->
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- Laundry Service Section -->
    <!-- <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Baju</div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach(['Express', 'Kilat', 'Reguler'] as $service)
                    <div class="col-4">
                        <div class="card" data-bs-toggle="{{ $service == 'Reguler' ? 'modal' : '' }}" data-bs-target="{{ $service == 'Reguler' ? '#staticBackdrop' : '' }}">
                            <div class="card-body text-center">
                                <img src="https://png.pngtree.com/png-clipart/20211115/original/pngtree-stacked-clothes-exquisite-clothes-cotton-long-sleeve-brand-png-image_6926601.png"
                                     alt="{{ $service }}" width="80px" class="img-fluid mb-3">
                                <span><b>{{ $service }}</b></span><br>
                                <span>Harga: Rp 5000</span><br>
                                <span>Hari: 3 hari</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> -->

    <!-- Modal for Service Selection
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Baju (Reguler)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="serviceOptions" id="dryClean" value="Cuci Kering">
                        <label class="form-check-label" for="dryClean">Cuci Kering</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="serviceOptions" id="washIron" value="Cuci Setrika">
                        <label class="form-check-label" for="washIron">Cuci Setrika</label>
                    </div>
                    <div class="px-3 mb-3">
                        <label for="quantity" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="quantity" aria-describedby="quantityHelp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Blanket Service Section -->
    <!-- <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Selimut</div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach(['Express', 'Kilat', 'Reguler'] as $service)
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDshbRkIeMsncnrfwEN8KpSXR8hrzcEQp_Gg&s"
                                     alt="{{ $service }}" width="80px" class="img-fluid mb-3">
                                <span><b>{{ $service }}</b></span><br>
                                <span>Harga: Rp 5000</span><br>
                                <span>Hari: 3 hari</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> -->
</div>
@endsection
<script src="{{ url('dist/js/jquery1.js') }}"></script>
    <script src="{{ url('dist/js/Tables.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
    <script>
        // new DataTable('#example');
        $(document).ready(function() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/proyek',
                method: 'GET',
                success: function(data) {
                    let proyekSelect = $('#proyek_id');
                    proyekSelect.empty(); // Hapus opsi yang ada
                    proyekSelect.append(
                        '<option value="">Pilih Proyek</option>'); // Tambahkan opsi default
                    $.each(data, function(key, proyek) {
                        proyekSelect.append('<option value="' + proyek.id + '">' + proyek
                            .nama_proyek + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching proyek data:', error);
                }
            });
            $('#example').DataTable({
                ajax: {
                    url: 'http://127.0.0.1:8000/api/tim', // URL API Anda
                    dataSrc: ''
                },
                columns: [{
                        "data": null,
                        "render": function(data, type, row, index) {
                            return index.row + 1;
                        }
                    },

                    {
                        "data": "nama_tim"
                    },
                    {
                        "data": "peran"
                    },
                    {
                        "data": "gambar_tim",
                        "render": function(data) {
                            return `<img src="/storage/${data}" width="50" height="50">`;

                        }
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return row.proyek ? row.proyek.nama_proyek :
                                'N/A'; // Menampilkan nama_proyek jika tersedia, jika tidak 'N/A'
                        }
                    },


                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return '<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-jenis="Ubah" data-bs-id="' +
                                row.id + '" >Ubah</button>' +
                                '<button class="btn btn-danger btn-sm" onclick="hapusData(' + row
                                .id + ')">Hapus</button>'
                        }
                    }




                ]

            });
        });
        //const data tidak bisa diubah  dan let bisa diubah 
        // Event listener untuk membuka modal
        const targetModal = document.getElementById('exampleModal');
        let setIdTim = null; // Inisialisasi ID tim

        if (targetModal) {
            targetModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget; // Tombol yang memicu modal
                const jenisModal = button.getAttribute('data-bs-jenis'); // Ambil jenis modal
                setIdTim = button.getAttribute('data-bs-id'); // Ambil ID tim jika ada

                // Jika jenis modal adalah "Ubah", ambil data tim untuk diedit
                if (jenisModal === "Ubah") {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/tim/' + setIdTim, // Menggunakan endpoint show
                        method: 'GET',
                        success: function(data) {
                            $('#nama_tim').val(data.data.nama_tim);
                            $('#peran').val(data.data.peran);
                            $('#proyek_id').val(data.data.proyek_id);

                            $('#pr_gambar_tim').remove();
                            if (data.data.gambar_tim) {
                                $('#gambar_tim').after(
                                    `<div id="pr_gambar_tim"><img src="/storage/${data.data.gambar_tim}" width="30px">`
                                );
                            }

                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching data for edit:', error);
                        }
                    });
                } else {
                    // Kosongkan input saat menambah data baru
                    $('#gambar_tim').val('');
                    $('#nama_tim').val('');
                    $('#peran').val('');
                    $('#proyek_id').val('');
                    setIdTim = null; // Reset ID tim

                    $('#pr_gambar_tim').remove();

                }

                // Update judul modal
                const modalTitle = targetModal.querySelector('.modal-title');
                modalTitle.textContent = `${jenisModal} Tim`;
            });
        }

        // Submit form untuk tambah dan ubah
        $("#dataForm").submit(function(event) {
            event.preventDefault();
            let formData = new FormData(this);
            let sendData = 'http://127.0.0.1:8000/api/tim/';
            let setMethod = 'POST'; // Default method adalah POST

            // Jika ada ID, gunakan PUT untuk update
            if (setIdTim) {
                sendData += setIdTim;
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
                        url: 'http://127.0.0.1:8000/api/tim/' + id,
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

    
