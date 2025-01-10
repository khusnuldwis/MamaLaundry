@extends('layout.app2')

@section('title')
Nota Transaksi
@endsection

@section('content')
<div class='card' id="nota">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center"><b>Mama Laundry - Cabang</b></h3>
                <p class="text-center">Telepon: 08123456789</p>
                <hr>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <address>
                            <p>Kasir: {{ $order->user->name }}</p>
                            <p>Tanggal Order: {{ \Carbon\Carbon::parse($order->created_at)->format('D, d M Y') }}</p>
                            <p>Selesai: {{ \Carbon\Carbon::parse($order->tanggal_selesai)->format('D, d M Y') }}</p>
                        </address>
                    </div>
                    <div class="col-md-6 text-end">
                        <address>
                            <h4>Kepada: {{ $order->nama_pelanggan }}</h4>
                            <p>No HP: {{ $order->no_hp }}</p>
                        </address>
                    </div>
                </div>

                <div class="table-responsive mb-4">
                    <table class="table table-hover table-bordered" cellspacing="0" width="100%">
                        <thead class="thead-light">
                            <tr>
                                <th>Layanan</th>
                                <th>Berat</th>
                                <th>Harga Layanan</th>
                                <th>Metode Layanan</th>
                                <th>Durasi Layanan</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalHarga = 0;
                            @endphp
                            @foreach ($orderdetail as $data)
                            <tr>
                                <td>
                                    {{ $data->layanan->nama_layanan }} - 
                                
                                    {{ $data->layanan->category->jenis_kategori ?? 'N/A' }}
                                </td>
                                <td>{{ $data->berat }} / {{ $satuan[$data->layanan->unit] ?? 'N/A' }}</td>
                                <td>Rp. {{ number_format($data->harga) }}</td>
                                <td>{{ $data->metode_layanan->nama_metode_layanan }} - Rp. {{ number_format($data->metode_layanan->harga) }}</td>
                                <td>{{ $data->durasi->nama }} - Rp. {{ number_format($data->durasi->harga) }}</td>
                                <td>Rp. {{ number_format($data->total_harga) }}</td>
                            </tr>
                            @php
                            $totalHarga += $data->total_harga;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="text-end">
                    <h3><b>Total :</b> Rp. {{ number_format($totalHarga) }}</h3>
                    <hr>
                    <p>Terima kasih telah menggunakan layanan kami!</p>
                </div>
            </div>
        </div>
    </div>
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
    @media print {
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        #nota {
            width: 100%;
            padding: 20px;
            background-color: #fff;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            table-layout: fixed; /* Ensures better control over column widths */
        }

        table th, table td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
            word-wrap: break-word; /* Ensures text wraps within cells */
        }

        /* Prevent page breaks inside the table */
        table {
            page-break-inside: auto;
        }

        table tr {
            page-break-inside: avoid;
        }

        table td, table th {
            page-break-inside: avoid;
        }

        /* Hide the print button during printing */
        .print-btn {
            display: none;
        }

        /* Set A4 page size and margins */
        @page {
            size: A4;
            margin: 20mm;
        }

        /* Ensure proper text wrapping for long content */
        td {
            word-break: break-word;
        }
    }
</style>
