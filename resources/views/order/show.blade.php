@extends('layout.app2')

@section('title')
Nota Transaksi
@endsection

@section('content')
<style>
    .nota {
    font-family: Arial, sans-serif;
    font-size: 14px;
    width: 300px;
    margin: 0 auto;
    padding: 10px;
    border: 1px solid #ddd;
    line-height: 1.6;
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

</style>
<div class="nota" id="nota" style="width: 500px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; font-family: Arial, sans-serif; font-size: 14px;">
    <h4 class="text-center" style="margin: 0; padding: 0;">BANDAR LAUNDRY</h4>
    <p class="text-center" style="margin: 5px 0;">Jl. Kedondong Raya, Sunter Jaya, Jakarta Utara</p>
    <hr style="border-top: 1px solid #ccc; margin: 10px 0;">
    
    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d H:i:s') }}</p>
    <p><strong>No. Order:</strong> {{ $order->id }}</p>
    <p><strong>Kasir:</strong> {{ $order->user->name }}</p>
    <hr style="border-top: 1px solid #ccc; margin: 10px 0;">

    <h5 style="margin-bottom: 10px;">Detail Layanan:</h5>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
        <thead>
            <tr style="border-bottom: 1px solid #ddd;">
                <th style="text-align: left; padding: 5px;">Layanan</th>
                <th style="text-align: center; padding: 5px;">Berat</th>
                <th style="text-align: center; padding: 5px;">Harga</th>
                <th style="text-align: right; padding: 5px;">Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $subtotal = 0;
            @endphp
            @foreach ($orderdetail as $data)
            <tr>
                <td style="padding: 5px;">{{ $data->layanan->nama_layanan }}</td>
                <td style="text-align: center; padding: 5px;">{{ $data->berat }} kg</td>
                <td style="text-align: center; padding: 5px;">Rp. {{ number_format($data->harga) }}</td>
                <td style="text-align: right; padding: 5px;">Rp. {{ number_format($data->total_harga) }}</td>
            </tr>
            @php
                $subtotal += $data->total_harga;
            @endphp
            @endforeach
        </tbody>
    </table>
    <hr style="border-top: 1px solid #ccc; margin: 10px 0;">
    
    <h5 style="margin-bottom: 10px;">Durasi Layanan:</h5>
    <p>
        <strong>{{ $data->durasi->nama }}</strong> 
        ({{ $data->durasi->waktu }} Jam) - 
        Rp. {{ number_format($data->durasi->harga) }}
    </p>
    
    <h5 style="margin-bottom: 10px;">Metode Layanan:</h5>
    <p>
        <strong>{{ $data->metode_layanan->nama_metode_layanan }}</strong> 
        @if($data->metode_layanan)
        - Rp. {{ number_format($data->metode_layanan->harga) }}
        @endif
    </p>

    <h5 style="margin-bottom: 10px;">Antar-Jemput:</h5>
    <p>
        <strong>{{ $data->antarjemput ? 'Ya' : 'Tidak' }}</strong> 
        @if($data->antarjemput)
        - Rp. {{ number_format($data->antarjemput->harga) }}
        @endif
    </p>
    <hr style="border-top: 1px solid #ccc; margin: 10px 0;">

    <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
        <tr>
            <td style="padding: 5px;">Subtotal</td>
            <td style="text-align: right; padding: 5px;">Rp. {{ number_format($subtotal) }}</td>
        </tr>
        <tr>
            <td style="padding: 5px;">Durasi</td>
            <td style="text-align: right; padding: 5px;">Rp. {{ number_format($data->durasi->harga) }}</td>
        </tr>
        <tr>
            <td style="padding: 5px;">Antar-Jemput</td>
            <td style="text-align: right; padding: 5px;">
                Rp. {{ $data->antarjemput ? number_format($data->antarjemput->harga) : '0' }}
            </td>
        </tr>
        <tr style="border-top: 1px solid #ddd;">
            <td style="padding: 5px;"><strong>Total</strong></td>
            <td style="text-align: right; padding: 5px;"><strong>Rp. {{ number_format($subtotal + $data->durasi->harga + ($data->antarjemput->harga ?? 0)) }}</strong></td>
        </tr>
        <tr>
            <td style="padding: 5px;">Bayar</td>
            <td style="text-align: right; padding: 5px;">Rp. {{ number_format($data->bayar) }}</td>
        </tr>
        <tr>
            <td style="padding: 5px;">Kembali</td>
            <td style="text-align: right; padding: 5px;">Rp. {{ number_format($data->bayar - ($subtotal + $data->durasi->harga + ($data->antarjemput->harga ?? 0))) }}</td>
        </tr>
    </table>
    <hr style="border-top: 1px solid #ccc; margin: 10px 0;">
    <p style="text-align: center;">Terima kasih sudah menggunakan layanan kami!</p>
</div>



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

<style>
    /* Print-specific styles */
    .nota {
    font-family: Arial, sans-serif;
    font-size: 14px;
    width: 250px;
    margin: 0 auto;
    padding: 10px;
    border: 1px solid #ddd;
    line-height: 1.4;
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
    padding: 3px 0;
    text-align: left;
}

table th {
    border-bottom: 1px solid #ddd;
    font-weight: bold;
}

table td.text-end {
    text-align: right;
}

hr {
    border: none;
    border-top: 1px dashed #ccc;
}

</style>
