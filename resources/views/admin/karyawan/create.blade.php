@extends('layout.admin')

@section('title')
Data karyawan
@endsection
@section('content')
<h1 class="mt-3">Tambah karyawan</h1>

<div class="card mt-2 mb-3">
    <div class="container">
    <form action="{{route('karyawan.store')}}" method="POST">
 @csrf     
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">Nama Karyawan</label>
    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <div class="mb-3">
    <label for="no_hp" class="form-label">No Hp</label>
    <input type="number" class="form-control" name="no_hp" id="no_hp">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="alamat">
  </div>
  <button type="submit" class="btn btn-primary mb-3">Submit</button>
</form>
    </div>

</div>

@endsection
