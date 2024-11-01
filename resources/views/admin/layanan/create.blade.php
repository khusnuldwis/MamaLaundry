@extends('layout.app')

@section('title')
Data layanan
@endsection
@section('content')
<style>
  .mt-5 {
    margin-top: 60px;
  }
</style>
<h1 class="mt-5" style="margin: top 40px;margin: 9px;">Tambah layanan</h1>

<div class="card mt-2 mb-3">
  <div class="container">
    <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="thumbnail" class="form-label">No</label>
        <input type="number" class="form-control" name="thumbnail" id="thumbnail">
      </div>
      <div class="mb-3">
        <label for="nama_layanan" class="form-label">Nama Pelanggan</label>
        <input type="text" class="form-control" name="nama_layanan" id="nama_layanan">
      </div>
      <div class="mb-3">
        <label for="jenis_layanan" class="form-label">No Hp</label>
        <input type="number" class="form-control" name="jenis_layanan" id="jenis_layanan">
      </div>
      <div class="mb-3">
        <label for="thumbnail" class="form-label">Alamat</label>
        <input type="textarea" class="form-control" name="thumbnail" id="thumbnail">
      </div>
      <div class="mb-3">
        <label for="nama_layanan" class="form-label">Nama Layanan</label>
        <input type="text" class="form-control" name="nama_layanan" id="nama_layanan">
      </div>
      <div class="mb-3">
        <label for="jenis_layanan" class="form-label">Berat</label>
        <div class="col-sm-12">
          <select class="form-control" id="unit" name="unit">
            <option value="" selected disabled>Select Unit</option>
            <option value="1">Kg</option>
            <option value="2">Pcs</option>
          </select>
        </div>
      </div>
      <div class="mb-3">
        <label for="thumbnail" class="form-label">Tanggal Pemesanan</label>
        <input type="date" class="form-control" name="thumbnail" id="thumbnail">
      </div>
      <div class="mb-3">
        <label for="nama_layanan" class="form-label">Tanggal Selesai</label>
        <input type="date" class="form-control" name="nama_layanan" id="nama_layanan">
      </div>
      <div class="mb-3">
        <label for="jenis_layanan" class="form-label">Status Barang</label>
        <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan">
      </div>
      <!-- <div class="mb-3">
        <label for="nama_layanan" class="form-label">Pilihan</label>
        <input type="text" class="form-control" name="nama_layanan" id="nama_layanan">
      </div> -->

      <div class="form-group">
        <label class="col-sm-12" for="kategori">Kategori</label>
        <div class="col-sm-12">
          <select class="form-control" id="kategori" name="kategori">
            <option value="" selected disabled>Select kategori</option>
            <option value="1">Cuci Kering</option>
            <option value="2">Setrika</option>
          </select>
        </div>
      </div>
      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" name="harga" id="harga">
      </div>

      <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
  </div>

</div>

@endsection