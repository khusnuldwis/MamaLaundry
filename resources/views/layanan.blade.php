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
                            data-bs-target="#Layanan" data-bs-jenis="Tambah">Tambah</a>
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
                            <th scope="col">Unit</th>
                            <th scope="col">Nama Kategori</th>
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
        @CSRF
        <div class="modal fade" id="Layanan" tabindex="-1" aria-labelledby="LayananLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="LayananLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="thumbnail" class="col-sm-4 col-form-label">Gambar
                                Item</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail"
                                    placeholder="Masukkan gambar Layanan">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_layanan" class="col-sm-4 col-form-label">Nama Item</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_layanan" name="nama_layanan"
                                    placeholder="Masukkan nama layanan ">
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

   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
    <script>
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
    
            // Fetch categories for select input
            $.ajax({
                url: 'http://127.0.0.1:8000/api/categorys',
                method: 'GET',
                success: function(data) {
                    let timSelect = $('#category_id');
                    timSelect.empty(); // Remove existing options
                    timSelect.append('<option value="">Pilih Categori</option>'); // Add default option
                    $.each(data, function(key, category) {
                        timSelect.append('<option value="' + category.id + '">' + category.jenis_kategori + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching category data:', error);
                }
            });
    
            // Initialize DataTable
            $('#example').DataTable({
                ajax: {
                    url: 'http://127.0.0.1:8000/api/layanans', // Your API endpoint
                    dataSrc: ''
                },
                columns: [
                    {
                        "data": null,
                        "render": function(data, type, row, index) {
                            return index.row + 1; // Auto numbering
                        }
                    },
                    { "data": "nama_layanan" },
                    {
                        "data": "thumbnail",
                        "render": function(data) {
                            return `<img src="/storage/${data}" width="50" height="50">`; // Thumbnail image
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
                            return row.category ? row.category.jenis_kategori : 'N/A'; // Category name
                        }
                    },
                    { "data": "harga" },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return `
                                <div class="d-flex justify-content-start gap-2">
                                    <a href="#" class="btn btn-label-success btn-round btn-sm" 
                                    data-bs-toggle="modal" data-bs-target="#Layanan" 
                                    data-bs-jenis="Ubah" data-bs-id="${row.id}">
                                        <span class="btn-label"><i class="fa fa-pen"></i></span> Edit
                                    </a>
                                    <a href="#" class="btn btn-label-danger btn-round btn-sm" 
                                    onclick="hapusData(${row.id})">
                                        <span class="btn-label"><i class="fa fa-trash"></i></span> Hapus
                                    </a>
                                </div>
                            `;
                        }
                    }
                ]
            });
        });
    
        const targetModal = document.getElementById('Layanan');
        let setIdlayanan = null;
    
        if (targetModal) {
            targetModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget; // Button that triggered the modal
                const jenisModal = button.getAttribute('data-bs-jenis'); // Get modal type
                setIdlayanan = button.getAttribute('data-bs-id'); // Get service ID if present
    
                if (jenisModal === "Ubah" && setIdlayanan) {
                    // Fetch the service data for editing
                    $.ajax({
                        url: `http://127.0.0.1:8000/api/layanans/${setIdlayanan}`,
                        method: 'GET',
                        success: function(data) {
                            $('#nama_layanan').val(data.data.nama_layanan);
                            $('#unit').val(data.data.unit);
                            $('#harga').val(data.data.harga);
                            $('#category_id').val(data.data.category_id);
    
                            $('#pr_thumbnail').remove(); // Remove existing preview
                            if (data.data.thumbnail) {
                                $('#thumbnail').after(
                                    `<div id="pr_thumbnail"><img src="/storage/${data.data.thumbnail}" width="30px"></div>`
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching data for edit:', error);
                        }
                    });
                } else {
                    // Clear form fields for adding new entry
                    $('#thumbnail').val('');
                    $('#unit').val('');
                    $('#harga').val('');
                    $('#nama_layanan').val('');
                    $('#category_id').val('');
                    setIdlayanan = null; 
    
                    $('#pr_thumbnail').remove();
                }
    
                const modalTitle = targetModal.querySelector('.modal-title');
                modalTitle.textContent = `${jenisModal} Layanan`;
            });
        }
    
        $("#dataForm").submit(function (event) {
                event.preventDefault();

                let formData = new FormData(this);
                let url = 'http://127.0.0.1:8000/api/layanans';
                let method = 'POST';

                if (setIdlayanan) {
                    url += `/${setIdlayanan}`;
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
        // Handle delete
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
    </script>
    
@endsection
