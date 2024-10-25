@extends('layout.admin')

@section('title')
Data Metode Layanan
@endsection
@section('content')
<h1 class="mt-3">Edit Data Metode Layanan</h1>
<div class="card mb-4">
  <div class="container">
  <form  action="{{ route('metode_layanan.update', [$data->id]) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

  <div class="mb-3 mt-3">
    <label for="name" class="form-label">Nama Metode Layanan</label>
    <input type="text" class="form-control" value="{{ $data->nama_metode_layanan }}" name="nama_metode_layanan" id="nama_metode_layanan">
  </div>
  <div class="mb-3">
    <label for="harga" class="form-label">Harga</label>
    <input type="number" class="form-control" value="{{ $data->harga }}" name="harga" id="harga">
  </div>
  
 

  <button type="submit" class="btn btn-primary mb-3">Update</button>
</form>
  </div>

</div>

@endsection
