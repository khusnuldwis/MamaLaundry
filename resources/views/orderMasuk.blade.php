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
                            <div class="card-tools">
                                <div class="ms-md-auto py-2 py-md-0 float-end">
                                    <a href="#" class="btn btn-primary btn-round" data-bs-toggle="modal"
                                        data-bs-target="#registerModal">Add Customer</a>
                                </div>
    
                                <!-- Modal -->
                                <form id="formRegister" method="POST" action="{{ route('orderMasuk.store') }}">
                                    @csrf
                                    <div class="modal fade" id="registerModal" tabindex="-1"
                                        aria-labelledby="registerModalLabel" aria-hidden="true">
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
                                                        <input type="text" class="form-control" id="namaPelanggan"
                                                            name="namaPelanggan" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="noHp" class="form-label">No HP</label>
                                                        <input type="number" class="form-control" id="noHp" name="noHp"
                                                            required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="alamat" class="form-label">Alamat</label>
                                                        <input type="text" class="form-control" id="alamat" name="alamat"
                                                            required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="layanan" class="form-label">Item</label>
                                                        <select class="form-select" id="layanan" name="layanan_id" required>
                                                            <option value="" selected>Pilih Item</option>
                                                            @foreach ($layanans as $layanan)
                                                                <option value="{{ $layanan->id }}">
                                                                    {{ $layanan->nama_layanan }}</option>
                                                            @endforeach
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
                                                            <option value="Proses">Proses</option>
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
                                                            <option value="Belum Dibayar">Belum Dibayar</option>
                                                            <option value="Lunas">Lunas</option>
                                                        </select>
                                                    </div>
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
                                </form>
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
                                @foreach ($transaksis as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->nama_pelanggan }}</td>
                                        <td>{{ $order->no_hp }}</td>
                                        <td>{{ $order->alamat }}</td>
                                        <td>{{ $order->layanan->nama_layanan }}</td>
                                        <td>{{ $order->berat }} Kg</td>
                                        <td>{{ $order->tanggal_pemesanan }}</td>
                                        <td>{{ $order->tanggal_selesai }}</td>
                                        <td>{{ $order->status_barang }}</td>
                                        <td>{{ $order->status_pembayaran }}</td>
                                        <td>Rp {{ number_format($order->berat * 10000, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                                                <span class="btn-label"><i class="fa fa-pen"></i></span> Edit
                                            </a>
                                            <a href="#" class="btn btn-label-danger btn-round btn-sm">
                                                <span class="btn-label"><i class="fa fa-trash"></i></span> Hapus
                                            </a>
                                            {{-- <form action="{{ route('transaksi.destroy', $transaksis->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="myChartLegend"></div>
            </div>
        </div>
    </div>
@endsection