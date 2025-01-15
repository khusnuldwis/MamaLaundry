@extends('layout.app')

@section('title')
    Single Tabel
@endsection
@section('content')
    <div class="card card-round">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title">Data Karyawan</div>
                <div class="card-tools">
                    <div class="ms-md-auto py-2 py-md-0 float-end">
                        <a href="#" class="btn btn-primary btn-round"data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-bs-jenis="Tambah">Tambah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="container">
            <div class="table-responsive">
                    <table id="example" class="display nowrap" cellspacing="0" width="100%">

                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Profil</th>
                            <th scope="col">Cabang</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>

    <form id="dataForm">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Karyawan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Masukkan Nama Karyawan" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Masukkan email Karyawan" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password Karyawan" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="no_hp" class="col-sm-4 col-form-label">No Hp</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                    placeholder="Masukkan no_hp Karyawan" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="profil" class="col-sm-4 col-form-label">Profil</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="profil" name="profil"
                                    placeholder="Masukkan profil Karyawan" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="cabang" class="col-sm-4 col-form-label">Cabang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="cabang" name="cabang"
                                    placeholder="Masukkan cabang Karyawan" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="role_id" class="col-sm-4 col-form-label">Role</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="role_id" name="role_id">
                                    <option value="">Pilih Role</option>

                                </select>
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
            $.ajax({
                url: 'http://127.0.0.1:8000/api/roles',
                method: 'GET',
                success: function(data) {
                    let roleSelect = $('#role_id');
                    roleSelect.empty(); // Remove existing options
                    roleSelect.append('<option value="">Pilih Role</option>'); // Add default option
                    $.each(data, function(key, role) {
                        roleSelect.append('<option value="' + role.id + '">' + role.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching role data:', error);
                }
            });
            $('#example').DataTable({
                ajax: {
                    url: 'http://127.0.0.1:8000/api/users', // URL API Anda
                    dataSrc: ''
                },
                columns: [{
                        "data": null,
                        "render": function(data, type, row, index) {
                            return index.row + 1;
                        }
                    },

                    {
                        "data": "name"
                    },
                    {
                        "data": "email"
                    },
                    {
                        "data": "no_hp"
                    },
                    {
                        "data": "profil",
                        "render": function(data) {
                            return `<img src="/storage/${data}" width="50" height="50">`; // Thumbnail image
                        }
                    },
                    {
                        "data": "cabang"
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return row.role ? row.role.name : 'N/A'; // role name
                        }
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
        let setIdUsers = null; // Inisialisasi ID tim

        if (targetModal) {
            targetModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget; // Tombol yang memicu modal
                const jenisModal = button.getAttribute('data-bs-jenis'); // Ambil jenis modal
                setIdUsers = button.getAttribute('data-bs-id'); // Ambil ID tim jika ada

                // Jika jenis modal adalah "Ubah", ambil data tim untuk diedit
                if (jenisModal === "Ubah") {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/users/' +
                            setIdUsers, // Menggunakan endpoint show
                        method: 'GET',
                        success: function(data) {
                            $('#name').val(data.data.name);
                            $('#email').val(data.data.email);
                            $('#no_hp').val(data.data.no_hp);
                            $('#cabang').val(data.data.cabang);
                            $('#role_id').val(data.data.role_id);
                            $('#password').val(data.data.password);
    
                            $('#pr_profil').remove(); // Remove existing preview
                            if (data.data.thumbnail) {
                                $('#profil').after(
                                    `<div id="pr_profil"><img src="/storage/${data.data.profil}" width="30px"></div>`
                                );
                            }


                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching data for edit:', error);
                        }
                    });
                } else {
                    // Kosongkan input saat menambah data baru

                    $('#nama').val('');
                    $('#email').val('');
                    $('#no_hp').val('');
                    $('#cabang').val('');
                    $('#role_id').val('');
                    $('#password').val('');

                    setIdUsers = null; // Reset ID user
                    $('#pr_profil').remove();



                }

                // Update judul modal
                const modalTitle = targetModal.querySelector('.modal-title');
                modalTitle.textContent = `${jenisModal} Users`;
            });
        }

        // Submit form untuk tambah dan ubah
        $("#dataForm").submit(function(event) {
            event.preventDefault();
            let formData = new FormData(this);
            let sendData = 'http://127.0.0.1:8000/api/users/';
            let setMethod = 'POST'; // Default method adalah POST

            // Jika ada ID, gunakan PUT untuk update
            if (setIdUsers) {
                sendData += setIdUsers;
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
                        url: 'http://127.0.0.1:8000/api/users/' + id,
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
