@extends('layout.admin')

@section('title')
Data Jenis layanan
@endsection
@section('content')
<h1 class="mt-3">Tambah Jenis Layanan</h1>

<div class="card mt-2 mb-3">
    <div class="container">
    <form action="{{route('jenis_layanan.store')}}" method="POST">
 @csrf     
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">Nama jenis Layanan</label>
    <input type="text" class="form-control" name="nama_jenis_layanan" id="nama_jenis_layanan">
  </div>
  
  
  <button type="submit" class="btn btn-primary mb-3">Submit</button>
</form>
    </div>

</div>

@endsection
