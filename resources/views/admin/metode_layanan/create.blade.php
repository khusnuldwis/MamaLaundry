@extends('layout.admin')

@section('title')
Data Metode layanan
@endsection
@section('content')
<h1 class="mt-3">Tambah Metode Layanan</h1>

<div class="card mt-2 mb-3">
    <div class="container">
    <form action="{{route('metode_layanan.store')}}" method="POST">
 @csrf     
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">Nama Metode Layanan</label>
    <input type="text" class="form-control" name="nama_metode_layanan" id="nama_metode_layanan">
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
