@extends('layout.app')

@section('title', 'Transaksi')

@section('content')
<div class="container mt-5">
    <div class="card card-round">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title">Transaksi</div>
                <div class="card-tools">
                    <div class="ms-md-auto py-2 py-md-0 float-end">
                        <a href="#" class="btn btn-primary btn-round" data-bs-toggle="modal"
                            data-bs-target="#transaksiModal" data-bs-jenis="Tambah">Tambah</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tabel Transaksi -->
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="table-responsive">
                    <table id="orderTable" class="display nowrap" cellspacing="0" width="100%">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Transaksi</th>
                                <th>Nama Pelanggan</th>
                                <th>No HP</th>
                                <th>Tanggal Selesai</th>
                                <th>Status Pembayaran</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data akan dimasukkan di sini melalui AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

            <!-- Modal Form Transaksi -->
            <div class="modal fade" id="transaksiModal" tabindex="-1" aria-labelledby="transaksiModalLabel" aria-hidden="false">
                <div class="modal-dialog">
                    <form id="transaksiForm">
                    @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="transaksiModalLabel">Tambah Transaksi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                @csrf
                                <div class="row">
                                    <!-- Order Section -->
                                    <div class="col-md-12">
                                        <h4>Data Transaksi</h4>

                                        <!-- Nama Pelanggan -->
                                        <div class="form-group">
                                            <label class="col-md-12">Nama</label>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Input Name">
                                            </div>
                                        </div>

                                        <!-- Nomor HP -->
                                        <div class="form-group">
                                            <label class="col-md-12" for="no_hp">Nomor HP</label>
                                            <div class="col-md-12">
                                                <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="Input no_hp">
                                            </div>
                                        </div>

                                        <!-- Tanggal Selesai -->
                                        <div class="form-group">
                                            <label class="col-md-12" for="tanggal_selesai">Tanggal Selesai</label>
                                            <div class="col-md-12">
                                                <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="form-control" placeholder="Input tanggal_selesai">
                                            </div>
                                        </div>

                                        <!-- Status Pembayaran -->
                                        <div class="form-group">
                                            <label class="col-md-12" for="status_pembayaran">Status Pembayaran</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="status_pembayaran" name="status_pembayaran">
                                                    <option value="Belum Dibayar">Belum Dibayar</option>
                                                    <option value="Lunas">Lunas</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Transaksi Detail</h4>

                                        <!-- Product List -->
                                        <div id="listProd">
                                            <div class="row">
                                                <!-- Layanan -->
                                                <div class="col-md-8 form-group">
                                                    <label for="layanan_id" class="col-md-12">Layanan</label>
                                                    <div class="col-md-12">
                                                        <select name="layanan_id[]" id="layanan_id" class="form-control">
                                                            <option value="">Pilih Layanan</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Berat -->
                                                <div class="col-md-4 form-group">
                                                    <label for="berat_item" class="col-md-12">Berat</label>
                                                    <div class="col-md-12 d-flex">
                                                        <input type="text" class="form-control" value="1" name="berat_item[]" id="berat_item" placeholder="Input Berat">
                                                        <select name="unit[]" class="form-control ml-2" style="width: auto;">
                                                            <option value="kg">Kg</option>
                                                            <option value="pcs">Pcs</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Additional Product List -->
                                        <div id="elemProd"></div>

                                        <div class="col-md-12 mt-3">
                                            <button class="btn btn-warning m-b-15" type="button" onclick="appendDetailProd()">Tambah Layanan</button>
                                        </div>

                                        <!-- Metode Layanan -->
                                        <div class="form-group">
                                            <label for="metode_layanan_id" class="col-md-12">Metode Layanan</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="metode_layanan_id" name="metode_layanan_id[]">
                                                    <option value="">Pilih Metode Layanan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</div>
            @endsection

            <script src="{{ url('dist/js/jquery1.js') }}"></script>
            <script src="{{ url('dist/js/Tables.js') }}"></script>
            <!-- CSS DataTables -->
            <!-- CSS DataTables -->


            
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
            <script>
     $(document).ready(function () {
    $('#transaksiform').on('submit', function (e) {
        e.preventDefault(); // Mencegah form submit secara default

        let formData = new FormData(this);

        $.ajax({
            url: 'http://127.0.0.1:8000/api/orders/', // Endpoint Laravel untuk menyimpan data
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert('Transaksi berhasil disimpan!');
                location.reload(); // Reload halaman atau tutup modal
            },
            error: function (xhr) {
                console.error(xhr.responseJSON);
                alert('Terjadi kesalahan. Silakan periksa kembali data Anda.');
            }
        });
    });
});


</script>

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

                    const apiUrl = 'http://127.0.0.1:8000/api'; // Simpan URL API dalam variabel

                    // Ambil data layanan
                    $.ajax({
                        url: `${apiUrl}/layanans`,
                        method: 'GET',
                        success: function(data) {
                            let layananSelect = $('#layanan_id');
                            layananSelect.empty(); // Hapus opsi yang ada
                            layananSelect.append('<option value="">Pilih Layanan</option>'); // Tambahkan opsi default

                            $.each(data, function(key, layanan) {
                                let jenisLayanan = jenisLayananMapping[layanan.jenis_layanan] || 'N/A';
                                let kategoriLayanan = layanan.category ? layanan.category.jenis_kategori : 'N/A';

                                layananSelect.append(
                                    `<option value="${layanan.id}">${layanan.nama_layanan} - ${jenisLayanan} - ${kategoriLayanan}</option>`
                                );
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching layanan data:', error);
                        }
                    });

                    // Ambil data metode layanan
                    $.ajax({
                        url: `${apiUrl}/metode_layanans`,
                        method: 'GET',
                        success: function(data) {
                            let metodeSelect = $('#metode_layanan_id');
                            metodeSelect.empty(); // Hapus opsi yang ada
                            metodeSelect.append('<option value="">Pilih Metode Layanan</option>'); // Tambahkan opsi default
                            $.each(data, function(key, metode_layanan) {
                                metodeSelect.append(`<option value="${metode_layanan.id}">${metode_layanan.nama_metode_layanan}</option>`);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching metode layanan data:', error);
                        }
                    });

                    // Inisialisasi DataTable

                    $(document).ready(function() {
                        // Inisialisasi DataTable dengan pengaturan AJAX
                        $('#orderTable').DataTable({
                            ajax: {
                                url: 'http://127.0.0.1:8000/api/orders', // URL API Anda
                                method: 'GET',
                                dataSrc: 'orders', // Sesuaikan dengan nama key yang ada pada respons JSON
                            },
                            columns: [{
                                    "data": null,
                                    "render": function(data, type, row, index) {
                                        return index.row + 1; // Auto numbering
                                    }
                                },
                                {
                                    "data": "number"
                                },
                                {
                                    "data": "nama_pelanggan"
                                },
                                {
                                    "data": "no_hp"
                                },
                                {
                                    "data": "tanggal_selesai",
                                    "render": function(data) {
                                        if (!data) return 'N/A';
                                        const date = new Date(data);
                                        const year = date.getFullYear();
                                        const month = String(date.getMonth() + 1).padStart(2, '0');
                                        const day = String(date.getDate()).padStart(2, '0');
                                        return `${year}-${month}-${day}`;
                                    }
                                },
                                {
                                    "data": "status_pembayaran"
                                },
                                {
                                    "data": "total_harga",
                                    "render": function(data) {
                                        return 'Rp. ' + new Intl.NumberFormat().format(data); // Format harga
                                    }
                                },
                                {
                                    "data": null,
                                    "render": function(data, type, row) {
                                        return `
                                <td>
                                    <a href="#" class="btn btn-label-success btn-round btn-sm me-2" data-bs-toggle="modal" data-bs-target="#transaksiModal" data-bs-jenis="Ubah" data-bs-id="${row.id}">
                                        <span class="btn-label"><i class="fa fa-pen"></i></span> Edit
                                    </a>
                                    <a href="#" class="btn btn-label-danger btn-round btn-sm" onclick="hapusData(${row.id})">
                                        <span class="btn-label"><i class="fa fa-trash"></i></span> Hapus
                                    </a>
                                </td>
                    `;
                                    }
                                },
                                // {
                                //     "data": "orderdetail",
                                //     "render": function(data) {
                                //         // Menampilkan detail layanan
                                //         let orderDetails = data.map(detail => {
                                //             return `Layanan ID: ${detail.layanan_id}, Berat: ${detail.berat}kg, Harga: Rp. ${new Intl.NumberFormat().format(detail.harga)}`;
                                //         }).join('<br>');
                                //         return orderDetails;
                                //     }
                                // }
                            ],
                            // Menambahkan fitur pencarian, pengurutan, dan paginasi secara otomatis
                            paging: true,
                            searching: true,
                            ordering: true,
                            responsive: true
                        });
                    });




                    // Modal event listener
                    const targetModal = document.getElementById('transaksiModal');
                    let setIdOrders = null; // Inisialisasi ID tim

                    if (targetModal) {
                        targetModal.addEventListener('show.bs.modal', event => {
                            const button = event.relatedTarget; // Tombol yang memicu modal
                            const jenisModal = button.getAttribute('data-bs-jenis'); // Ambil jenis modal
                            setIdOrders = button.getAttribute('data-bs-id'); // Ambil ID tim jika ada

                            // Jika jenis modal adalah "Ubah", ambil data tim untuk diedit
                            if (jenisModal === "Ubah") {
                                $.ajax({
                                    url: `${apiUrl}/orders/${setIdOrders}`, // Menggunakan endpoint show
                                    method: 'GET',
                                    success: function(data) {
                                        $('#user_id').val(data.data.user_id);
                                        $('#created_at').val(data.data.created_at);
                                        $('#tanggal_selesai').val(data.data.tanggal_selesai);
                                        $('#number').val(data.data.number);
                                        $('#nama_pelanggan').val(data.data.nama_pelanggan);
                                        $('#no_hp').val(data.data.no_hp);
                                        $('#total_harga').val(data.data.total_harga);
                                        $('#status_pembayaran').val(data.data.status_pembayaran);
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Error fetching data for edit:', error);
                                    }
                                });
                            } else {
                                // Kosongkan input saat menambah data baru
                                $('#user_id').val('');
                                $('#created_at').val('');
                                $('#tanggal_selesai').val('');
                                $('#number').val('');
                                $('#nama_pelanggan').val('');
                                $('#no_hp').val('');
                                $('#total_harga').val('');
                                $('#status_pembayaran').val('');
                                setIdOrders = null; // Reset ID tim
                            }

                            // Update judul modal
                            const modalTitle = targetModal.querySelector('.modal-title');
                            modalTitle.textContent = `${jenisModal} Order`;
                        });
                    }

//                     $("#transaksiForm").submit(function(event) {
//     event.preventDefault();
//     let formData = new FormData(this);

//     // Cek data yang dikirimkan
//     console.log('Data yang dikirim:', formData);

//     let sendData = `${apiUrl}/orders/`;
//     let setMethod = 'POST';

//     if (setIdOrders) {
//         sendData += setIdOrders;
//         setMethod = 'PUT';
//     }

//     $.ajax({
//         url: sendData,
//         method: setMethod,
//         data: formData,
//         contentType: false,
//         processData: false,
//         success: function(response) {
//             Swal.fire({
//                 title: "Sukses!",
//                 text: response.pesan || "Data berhasil disimpan.",
//                 icon: "success",
//                 timer: 2000,
//                 timerProgressBar: true,
//                 didClose: () => {
//                     location.reload();
//                 }
//             });
//         },
//         error: function(xhr, status, error) {
//             console.error('Error saving data:', error);
//             Swal.fire({
//                 title: "Gagal!",
//                 text: "Terjadi kesalahan saat menyimpan data: " + xhr.responseJSON.pesan,
//                 icon: "error"
//             });
//         }
//     });
// });



                    // Fungsi untuk hapus data
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
                                    url: `${apiUrl}/orders/${id}`,
                                    method: 'DELETE',
                                    success: function(data) {
                                        Swal.fire({
                                            title: "Deleted!",
                                            text: "Your file has been deleted.",
                                            icon: "success",
                                            timer: 2000,
                                            timerProgressBar: true,
                                            didClose: () => {
                                                location.reload(); // Refresh halaman setelah delete
                                            }
                                        });
                                    }
                                });
                            }
                        });
                    }
                });
            </script>
            <script>
    function appendDetailProd() {
        var element = $('#listProd').html();
        $('#elemProd').append(element);
    }
</script>