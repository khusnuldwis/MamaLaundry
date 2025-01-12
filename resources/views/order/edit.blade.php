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
                                <option value="Belum Dibayar" {{ ($data->status_pembayaran == 'Belum Dibayar') ? 'selected' : '' }}>Belum Dibayar</option>
                                <option value="Lunas" {{ ($data->status_pembayaran == 'Lunas') ? 'selected' : '' }}>Lunas</option>
                            </select>
                        </div>

                        <!-- Status Pengerjaan -->
                        <div class="form-group">
                            <label for="status_pengerjaan">Status Pengerjaan</label>
                            <select class="form-control" id="status_pengerjaan" name="status_pengerjaan" required>
                            <option selected >Pilih Status Pengerjaan</option>
                                <option value="masuk" {{ ($data->status_pengerjaan == 'masuk') ? 'selected' : '' }}>Masuk</option>
                                <option value="proses" {{ ($data->status_pengerjaan == 'proses') ? 'selected' : '' }}>Proses</option>
                                <option value="selesai" {{ ($data->status_pengerjaan == 'selesai') ? 'selected' : '' }} >Selesai</option>
                                <option value="diambil" {{ ($data->status_pengerjaan == 'diambil') ? 'selected' : '' }} >diambil</option>
                                <option value="belum_diambil"{{ ($data->status_pengerjaan == 'belum_diambil') ? 'selected' : '' }}> Belum Diambil</option>
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
