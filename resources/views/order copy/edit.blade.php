@extends('layout.app2')

@section('title')
    Edit Orders
@endsection

@section('content')
<div class="container mt-4">
    <div class="card card-round">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title">Edit Transaksi</div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="container p-4">
        <form action="{{ url('/transaksi/update-status/' . $data->id) }}" method="POST">
    @csrf
   <!-- Status Pembayaran -->
   <div class="form-group">
                            <label for="status_pembayaran">Status Pembayaran</label>
                            <select class="form-control" id="status_pembayaran" name="status_pembayaran" required>
                            <option selected>Pilih Status Pembayaran</option>
                                <option value="Belum Dibayar">Belum Dibayar</option>
                                <option value="Lunas">Lunas</option>
                            </select>
                        </div>

                        <!-- Status Pengerjaan -->
                        <div class="form-group">
                            <label for="status_pengerjaan">Status Pengerjaan</label>
                            <select class="form-control" id="status_pengerjaan" name="status_pengerjaan" required>
                            <option selected>Pilih Status Pengerjaan</option>
                                <option value="masuk">Masuk</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                                <option value="diambil">Diambil</option>
                            </select>
                        </div>
                        <div class="text-end mt-3">
        <a href="{{ route('order.index') }}" class="btn btn-danger float-left" style="background-color: #eb3a3a; border-color: #eb3a3a;">Kembali</a>
   <button type="submit" class="btn btn-primary">Perbarui Status</button>
</div>

</form>








    </div>
</div>
@endsection
