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
                                data-bs-target="#registerModal">Add Customer</a>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="registerModalLabel">Tambah Data Pelanggan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formRegister">
                                                <div class="mb-3">
                                                    <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
                                                    <input type="text" class="form-control" id="namaPelanggan"
                                                        name="namaPelanggan" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="noHP" class="form-label">No HP</label>
                                                    <input type="text" class="form-control" id="noHP" name="noHP"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <textarea class="form-control" id="alamat" name="alamat" rows="2" required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="layanan" class="form-label">Layanan</label>
                                                    <select class="form-select" id="layanan" name="layanan" required>
                                                        <option value="" selected>Pilih Layanan</option>
                                                        <option value="Cuci Kering">Cuci Kering</option>
                                                        <option value="Cuci Setrika">Cuci Setrika</option>
                                                        <option value="Setrika Saja">Setrika Saja</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="berat" class="form-label">Berat (Kg)</label>
                                                    <input type="number" class="form-control" id="berat" name="berat"
                                                        min="0" step="0.1" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggalPemesanan" class="form-label">Tanggal
                                                        Pemesanan</label>
                                                    <input type="date" class="form-control" id="tanggalPemesanan"
                                                        name="tanggalPemesanan" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggalSelesai" class="form-label">Tanggal Selesai</label>
                                                    <input type="date" class="form-control" id="tanggalSelesai"
                                                        name="tanggalSelesai" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="statusBarang" class="form-label">Status Barang</label>
                                                    <select class="form-select" id="statusBarang" name="statusBarang"
                                                        required>
                                                        <option value="" selected>Pilih Status</option>
                                                        <option value="Diproses">Diproses</option>
                                                        <option value="Selesai">Selesai</option>
                                                        <option value="Diambil">Diambil</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="statusPembayaran" class="form-label">Status
                                                        Pembayaran</label>
                                                    <select class="form-select" id="statusPembayaran"
                                                        name="statusPembayaran" required>
                                                        <option value="" selected>Pilih Status</option>
                                                        <option value="Belum Lunas">Belum Lunas</option>
                                                        <option value="Lunas">Lunas</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary"
                                                form="formRegister">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive table-hover table-sales">
                        <table class="table">
                            <style>
                                table {
                                    width: 100%;
                                    table-layout: auto;
                                    border-collapse: collapse;
                                }

                                th,
                                td {
                                    padding: 8px;
                                    white-space: nowrap;
                                    /* Prevents text from wrapping */
                                    border: 1px solid #ddd;
                                }

                                /* Optional: Add scroll if the table is too wide */
                                .table-container {
                                    overflow-x: auto;
                                }
                            </style>
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
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Ursa</td>
                                    <td>081234567890</td>
                                    <td>Ds. Jati, Jl. Marak</td>
                                    <td>Cuci Kering</td>
                                    <td>5 Kg</td>
                                    <td>Sep 22, 2024</td>
                                    <td>Sep 25, 2024</td>
                                    <td class="status-barang">
                                        <select class="form-select status-dropdown" onchange="updateDropdownColor(this)">
                                            <option value="proses" data-color="lightsalmon">Proses
                                            </option>
                                            <option value="selesai" data-color="aquamarine">Selesai
                                            </option>
                                            <option value="diambil" data-color="darkturquoise">Diambil
                                            </option>
                                        </select>
                                    </td>
                                    <td class="status-pembayaran">
                                        <select class="form-select payment-dropdown" onchange="updateDropdownColor(this)">
                                            <option value="belum_dibayar" data-color="lightcoral">Belum
                                                Dibayar</option>
                                            <option value="dibayar" data-color="lightgreen">Dibayar
                                            </option>
                                        </select>
                                    </td>
                                    <td>Rp 50,000</td>
                                    <td>
                                        <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                            <span class="btn-label">
                                                <i class="fa fa-pencil"></i>
                                            </span>
                                            Export
                                        </a>
                                        <a href="#" class="btn btn-label-info btn-round btn-sm">
                                            <span class="btn-label">
                                                <i class="fa fa-print"></i>
                                            </span>
                                            Print
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Rasya</td>
                                    <td>081234567890</td>
                                    <td>Ds. Jati, Jl. Beru</td>
                                    <td>Cuci Setrika</td>
                                    <td>10 Pcs</td>
                                    <td>Sep 22, 2024</td>
                                    <td>Sep 25, 2024</td>
                                    <td class="status-barang">
                                        <select class="form-select status-dropdown" onchange="updateDropdownColor(this)">
                                            <option value="proses" data-color="lightsalmon">Proses
                                            </option>
                                            <option value="selesai" data-color="aquamarine">Selesai
                                            </option>
                                            <option value="diambil" data-color="darkturquoise">Diambil
                                            </option>
                                        </select>
                                    </td>
                                    <td class="status-pembayaran">
                                        <select class="form-select payment-dropdown" onchange="updateDropdownColor(this)">
                                            <option value="belum_dibayar" data-color="lightcoral">Belum
                                                Dibayar</option>
                                            <option value="dibayar" data-color="lightgreen">Dibayar
                                            </option>
                                        </select>
                                    </td>
                                    <td>Rp 76,000</td>
                                    <td>
                                        <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                            <span class="btn-label">
                                                <i class="fa fa-pencil"></i>
                                            </span>
                                            Export
                                        </a>
                                        <a href="#" class="btn btn-label-info btn-round btn-sm">
                                            <span class="btn-label">
                                                <i class="fa fa-print"></i>
                                            </span>
                                            Print
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="myChartLegend"></div>
            </div>
        </div>
    </div>
@endsection
