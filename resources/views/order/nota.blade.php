@extends('layout.app2')

@section('title')
Nota Transaksi
@endsection

@section('content')
<style>
    .nota {
        background-color: #fff;
        font-family: Arial, sans-serif;
        font-size: 14px;
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
        padding: 10px;
        border: 1px solid #ddd;
        line-height: 1.6;
        box-sizing: border-box;
    }

    .text-center {
        text-align: center;
        margin: 0;
        padding: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        padding: 5px;
        text-align: left;
    }

    table th {
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    table td {
        border-bottom: 1px dashed #ccc;
    }

    ul {
        padding-left: 15px;
    }

    hr {
        border: none;
        border-top: 1px dashed #ccc;
    }

    @media print {
        body * {
            visibility: hidden;
        }

        #nota, #nota * {
            visibility: visible;
        }

        #nota {
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .btn, .text-end {
            display: none;
        }
    }

    @media (max-width: 576px) {
        .nota {
            font-size: 12px;
        }

        table th, table td {
            padding: 3px;
        }
    }
</style>

<div class="nota" id="nota">
    <h4 class="text-center" style="margin: 0; padding: 0;">Mama LAUNDRY</h4>
    <p class="text-center" style="margin: 5px 0;">{{ $order->user->cabang }}</p>
    <hr style="border-top: 1px solid #ccc; margin: 10px 0;">

    <div style="display: flex; justify-content: space-between; font-size: 14px;">
        <div>
            <p><strong>No. Order:</strong> {{ $order->kode_transaksi }}</p>
            <p><strong>Nama Pelanggan:</strong> {{ $order->nama_pelanggan }}</p>
        </div>
        <div style="text-align: right;">
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d ') }}</p>
            <p><strong>Kasir:</strong> {{ $order->user->name }}</p>
        </div>
    </div>

    <hr style="border-top: 1px solid #ccc; margin: 10px 0;">

    <h5 style="margin-bottom: 10px;">Detail Layanan:</h5>
    <table>
        <thead>
            <tr>
                <th>Layanan</th>
                <th>Berat</th>
                <th>Harga</th>
                <th class="text-end">Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderdetail as $data)
            <tr>
                <td>{{ $data->layanan->nama_layanan }}</td>
                <td>{{ $data->berat }} kg</td>
                <td>Rp. {{ number_format($data->harga) }}</td>
                <td class="text-end">Rp. {{ number_format($data->sub_total) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr style="border-top: 1px solid #ccc; margin: 10px 0;">

    <table>
        <tr>
            <td>Durasi: {{ $data->durasi->nama }}</td>
            <td class="text-end">Rp. {{ number_format($data->durasi->harga) }}</td>
        </tr>
        <tr>
            <td>Biaya Pengantaran</td>
            <td class="text-end">Rp. {{ number_format($data->metode_layanan->harga) }}</td>
        </tr>
        <tr>
            <td><strong>Total</strong></td>
            <td class="text-end"><strong>Rp. {{ number_format($data->total_harga) }}</strong></td>
        </tr>
       
    </table>

    <hr style="border-top: 1px solid #ccc; margin: 10px 0;">
    <p class="text-center">Terima kasih sudah menggunakan layanan kami!</p>
</div>

<div class="text-end mt-3">
    <a href="{{ route('order.index') }}" class='btn btn-danger' style="background-color: #eb3a3a; border-color: #eb3a3a;">Kembali</a>
    <button class="btn btn-warning" onclick="printNota()" style="background-color: red; border-color: red; color: white;">Cetak Nota</button>
</div>

@endsection

<script>
    function printNota() {
        var printContents = document.getElementById("nota").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
