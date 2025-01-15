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
 
                        <!-- Status Pengerjaan -->
                        <div class="form-group">
                            <label for="status_layanan">Status Layanan</label>
                            <select class="form-control" id="status_layanan" name="status_layanan" required>
                            <option selected >Pilih Status Pengerjaan</option>
                                <option value="masuk" {{ ($data->status_layanan == 'masuk') ? 'selected' : '' }}>Masuk</option>
                                <option value="diambil" {{ ($data->status_layanan == 'diambil') ? 'selected' : '' }}>diambil</option>
                                <option value="belum_diambil" {{ ($data->status_layanan == 'belum_diambil') ? 'selected' : '' }} >belum_diambil</option>
                                <option value="selesai" {{ ($data->status_layanan == 'selesai') ? 'selected' : '' }} >selesai</option>
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
