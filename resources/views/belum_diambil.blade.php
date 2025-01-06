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
                    <div class="card-title">Belum Diambil</div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive table-hover table-sales">
            <table class="table table-sm table-bordered" id="example">
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
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksis as $order)
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Tambahkan library DataTables -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            }
        });
    });
</script>
