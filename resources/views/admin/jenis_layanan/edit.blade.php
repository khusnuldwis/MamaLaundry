@extends('layout.admin')

@section('title')
Data Jenis Layanan
@endsection
@section('content')
<h1 class="mt-3">Edit Data Jenis Layanan</h1>
<div class="card mb-4">
  <div class="container">
  <form  action="{{ route('jenis_layanan.update', [$data->id]) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

  <div class="mb-3 mt-3">
    <label for="name" class="form-label">Nama Jenis Layanan</label>
    <input type="text" class="form-control" value="{{ $data->nama_jenis_layanan }}" name="nama_jenis_layanan" id="nama_jenis_layanan">
  </div>

  <button type="submit" class="btn btn-primary mb-3">Update</button>
</form>
  </div>

</div>

@endsection
