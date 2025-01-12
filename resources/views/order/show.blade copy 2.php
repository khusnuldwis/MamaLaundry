@extends('layout.app2')

@section('title')
Nota Transaksi
@endsection

@section('content')

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
    </style>

    <h2>Nota Transaksi</h2>
    <p><strong>Kode Transaksi:</strong> {{ $transaksi->kode_transaksi }}</p>
    <p><strong>Tanggal:</strong> {{ $transaksi->created_at->format('d-m-Y H:i') }}</p>
    <p><strong>Nama Pelanggan:</strong> {{ $transaksi->nama_pelanggan }}</p>
    <p><strong>No HP:</strong> {{ $transaksi->no_hp }}</p>
    <hr>
    <h3>Detail Layanan</h3>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Layanan</th>
                <th>Metode</th>
                <th>Durasi</th>
                <th>Berat (kg)</th>
                <th>Harga Layanan</th>
                <th>Sub Total</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi->details as $index => $detail)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $detail->layanan->nama }}</td>
                <td>{{ $detail->metodeLayanan->nama }}</td>
                <td>{{ $detail->durasi->nama }}</td>
                <td>{{ $detail->berat }}</td>
                <td>{{ number_format($detail->harga, 0, ',', '.') }}</td>
                <td>{{ number_format($detail->sub_total, 0, ',', '.') }}</td>
                <td>{{ number_format($detail->total_harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="text-right"><strong>Total Harga:</strong></td>
                <td>{{ number_format($transaksi->details->sum('total_harga'), 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
    <hr>
    <p><strong>Status Pembayaran:</strong> {{ $transaksi->status_pembayaran }}</p>
    <p><strong>Status Pengerjaan:</strong> {{ $transaksi->status_pengerjaan }}</p>



<div class="text-end mt-3">

                    <a href="{{ route('order.index') }}" class='btn btn-danger float-left ' style="background-color: #eb3a3a; border-color: #eb3a3a;">Kembali</a>
                
    <button class="btn btn-warning" onclick="printNota()" style="background-color:red;border-color:red;color:white">Cetak Nota</button>
</div>

@endsection

<script src="{{ asset('plugins/components/jquery/dist/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function printNota() {
    var printContents = document.getElementById("nota").innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
  }
</script>