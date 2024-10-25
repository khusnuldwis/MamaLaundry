@extends('layout.admin')

@section('title')
Data Karyawan
@endsection
@section('content')
<h1 class="mt-3">Edit Data Karyawan</h1>
<div class="card mb-4">
  <div class="container">
  <form  action="{{ route('karyawan.update', [$data->id]) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

  <div class="mb-3 mt-3">
    <label for="name" class="form-label">Nama Karyawan</label>
    <input type="text" class="form-control" value="{{ $data->nama_karyawan }}" name="nama_karyawan" id="nama_karyawan">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" value="{{ $data->password }}" name="password" id="password">
  </div>
  <div class="mb-3">
    <label for="no_hp" class="form-label">No Hp</label>
    <input type="text" class="form-control" value="{{ $data->no_hp }}" name="no_hp" id="no_hp">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" value="{{ $data->alamat }}" name="alamat" id="alamat">
  </div>
 

  <button type="submit" class="btn btn-primary mb-3">Update</button>
</form>
  </div>

</div>

@endsection
