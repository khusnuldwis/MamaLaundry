@extends('layout.app2')

@section('content')
<div class="container">
    <h3>Pembayaran Transaksi</h3>
    <div class="card">
        <div class="card-body">
            <h5>Detail Transaksi</h5>
            <p><strong>Nama Pelanggan:</strong> {{ $order->nama_pelanggan }}</p>
            <p><strong>Total:</strong> Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>

            <form action="{{ route('order.processPayment', $order->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="bayar">Bayar</label>
                    <input type="number" class="form-control" id="bayar" name="bayar" placeholder="Masukkan jumlah bayar" required>
                </div>
                <div class="form-group">
                    <label for="kembalian">Kembalian</label>
                    <input type="text" class="form-control" id="kembalian" placeholder="Kembalian" readonly>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Proses Pembayaran</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('bayar').addEventListener('input', function () {
        const total = {{ json_encode($order->total_harga ?? 0) }}; // Pastikan nilai total valid
        const bayar = parseFloat(this.value) || 0; // Ambil nilai input bayar
        const kembalian = bayar - total; // Hitung kembalian

        // Update nilai kembalian di input
        document.getElementById('kembalian').value = kembalian > 0 ? kembalian : 0;
    });
</script>

@endsection
