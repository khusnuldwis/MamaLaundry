@extends('layout.app')

@section('title')
    Data Orderan
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Data Masuk</div>
                        <div class="card-tools">
                            <div class="ms-md-auto py-2 py-md-0 float-end">
                                <a href="#" class="btn btn-primary btn-round" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Add Customer</a>
                            </div>
                            <!-- Modal -->
                            <form id="dataForm" >
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="registerModalLabel">Tambah Data Order</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
                                                    <input type="text" class="form-control" id="nama_pelanggan"
                                                        name="nama_pelanggan" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="noHp" class="form-label">No HP</label>
                                                    <input type="number" class="form-control" id="no_hp" name="no_hp"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="layanan" class="form-label">Item</label>
                                                    <select class="form-select" id="layanan_id" name="layanan_id" required>
                                                        <option value="" selected>Pilih Layanan</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="berat" class="form-label">Berat (Kg)</label>
                                                    <input type="number" class="form-control" id="berat" name="berat"
                                                        min="0" step="0.1" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggalPemesanan" class="form-label">Tanggal Pemesanan</label>
                                                    <input type="date" class="form-control" id="tanggal_pemesanan"
                                                        name="tanggal_pemesanan" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggalSelesai" class="form-label">Tanggal Selesai</label>
                                                    <input type="date" class="form-control" id="tanggal_selesai"
                                                        name="tanggal_selesai" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="statusBarang" class="form-label">Status Barang</label>
                                                    <select class="form-select" id="status_barang" name="status_barang" required>
                                                        <option value="" selected>Pilih Status</option>
                                                        <option value="Proses">Proses</option>
                                                        <option value="Selesai">Selesai</option>
                                                        <option value="Diambil">Diambil</option>
                                                        <option value="Belum_Diambil">Belum Diambil</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="statusPembayaran" class="form-label">Status Pembayaran</label>
                                                    <select class="form-select" id="status_pembayaran"
                                                        name="status_pembayaran" required>
                                                        <option value="" selected>Pilih Status</option>
                                                        <option value="BelumDibayar">Belum Dibayar</option>
                                                        <option value="Lunas">Lunas</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary"
                                                    >Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive table-hover table-sales">
                        <table class="table" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Layanan</th>
                                    <th>Berat</th>
                                    <th>Tanggal Pemesanan</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Status Barang</th>
                                    <th>Status Pembayaran</th>
                                    <th>Total Pembayaran</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="{{ url('dist/js/jquery1.js') }}"></script>
<script src="{{ url('dist/js/Tables.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        const statusBarang = {
            Proses: 'Proses',
            Selesai: 'Selesai',
            Diambil: 'Diambil',
            Belum_Diambil: 'Belum Diambil',
        };

        const statusPembayaran = {
            BelumDibayar: 'Belum Dibayar',
            Lunas: 'Lunas'
        };

        // Fetch layanan data
        $.ajax({
            url: 'http://127.0.0.1:8000/api/layanans',
            method: 'GET',
            success: function(data) {
                let LayananSelect = $('#layanan_id');
                LayananSelect.empty(); // Clear existing options
                LayananSelect.append('<option value="">Pilih Layanan</option>');
                $.each(data, function(key, category) {
                    LayananSelect.append('<option value="' + category.id + '">' + category.nama_layanan + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching layanan data:', error);
            }
        });

        // Initialize DataTable
        $('#example').DataTable({
            ajax: {
                url: 'http://127.0.0.1:8000/api/transaksi',
                dataSrc: ''
            },
            columns: [
                {
                    "data": null,
                    "render": function(data, type, row, index) {
                        return index.row + 1; // Auto numbering
                    }
                },
                {
                    "data": "nama_pelanggan"
                },
                {
                    "data": "no_hp"
                },
                {
                    "data": "alamat"
                },
                {
                    "data": "layanan",
                    "render": function(data) {
                        return data ? data.nama_layanan : 'N/A'; 
                    }
                },
                {
                    "data": "berat"
                },
                {
                    "data": "tanggal_pemesanan"
                },
                {
                    "data": "tanggal_selesai"
                },
                {
                    "data": "status_barang",
                    "render": function(data) {
                        return statusBarang[data] || 'N/A'; 
                    }
                },
                {
                    "data": "status_pembayaran",
                    "render": function(data) {
                        return statusPembayaran[data] || 'N/A'; 
                    }
                },
                {
                    data: function(row) {
                        return 'Rp ' + (row.berat * 10000).toLocaleString('id-ID'); 
                    }
                },
                {
                    "data": null,
                    "render": function(data, type, row) {
                        return `
                            <div class="d-flex justify-content-start gap-2">
                                <a href="#" class="btn btn-label-success btn-round btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-jenis="Ubah" data-bs-id="${row.id}">
                                    <span class="btn-label"><i class="fa fa-pen"></i></span> Edit
                                </a>
                                <a href="#" class="btn btn-label-danger btn-round btn-sm" onclick="hapusData(${row.id})">
                                    <span class="btn-label"><i class="fa fa-times"></i></span> Hapus
                                </a>
                            </div>`;
                    }
                }
            ],
            order: [[0, 'asc']]
        });

        const targetModal = document.getElementById('exampleModal');
        let setIdTransaksi = null; // Initialize transaction ID

        if (targetModal) {
            targetModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget; // Button that triggers the modal
                const jenisModal = button.getAttribute('data-bs-jenis'); // Get modal type (Add/Edit)
                setIdTransaksi = button.getAttribute('data-bs-id'); // Get ID if editing

                // If modal type is "Ubah", fetch data for editing
                if (jenisModal === "Ubah") {
                    $.ajax({
                        url: 'http://127.0.0.1:8000/api/transaksi/' + setIdTransaksi, // Use the correct endpoint
                        method: 'GET',
                        success: function(data) {
                            $('#nama_pelanggan').val(data.nama_pelanggan);
                            $('#no_hp').val(data.no_hp);
                            $('#layanan_id').val(data.layanan_id);
                            $('#alamat').val(data.alamat);
                            $('#berat').val(data.berat);
                            $('#tanggal_pemesanan').val(data.tanggal_pemesanan);
                            $('#tanggal_selesai').val(data.tanggal_selesai);
                            $('#status_barang').val(data.status_barang);
                            $('#status_pembayaran').val(data.status_pembayaran);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching data for edit:', error);
                        }
                    });
                } else {
                    // Clear fields for adding new transaction
                    $('#nama_pelanggan').val('');
                    $('#no_hp').val('');
                    $('#layanan_id').val('');
                    $('#alamat').val('');
                    $('#berat').val('');
                    $('#tanggal_pemesanan').val('');
                    $('#tanggal_selesai').val('');
                    $('#status_barang').val('');
                    $('#status_pembayaran').val('');
                    
                    setIdTransaksi = null; // Reset ID
                }

                const modalTitle = targetModal.querySelector('.modal-title');
                modalTitle.textContent = `${jenisModal} Transaksi`; // Set modal title
            });
        }

        // Handle form submission for add/edit
        $("#dataForm").submit(function(event) {
            event.preventDefault();
            let formData = new FormData(this);
            let sendData = 'http://127.0.0.1:8000/api/transaksi/';
            let setMethod = 'POST'; 

            if (setIdTransaksi) {
                sendData += setIdTransaksi;
                setMethod =
                    'POST';
                formData.append('_method', 'PUT');
            }

            $.ajax({
                url: sendData,
                method: setMethod,
                data: formData,
                contentType: false, 
                processData: false,
                success: function(response) {
                    Swal.fire({
                        title: "Sukses!",
                        text: response.pesan || "Data berhasil disimpan.",
                        icon: "success",
                        timer: 2000,
                        timerProgressBar: true,
                        didClose: () => {
                            location.reload();
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

    });

    function hapusData(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            showCancelButton: true,
            confirmButtonText: 'Yes, Hapus!',
            cancelButtonText: 'No, Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `http://127.0.0.1:8000/api/transaksi/${id}`,
                    type: 'DELETE',
                    success: function(response) {
                        Swal.fire('Deleted!', 'Data berhasil dihapus.', 'success');
                        $('#example').DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        Swal.fire('Error!', 'Gagal menghapus data.', 'error');
                    }
                });
            }
        });
    }
</script>

