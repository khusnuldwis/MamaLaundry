@extends('layout.admin')

@section('title')
Data layanan
@endsection
@section('content')

<h1 class="mt-5" style="margin: top 40px;;">Tambah layanan</h1>

<div class="card mt-2 mb-3">
  <div class="container">
  <form  action="{{ route('layanan.update', [$data->id]) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
      <div class="mb-3">
        <label for="thumbnail" class="form-label">Gambar Layanan</label>
        <input type="file" class="form-control" name="thumbnail" value="{{$data->thumbnail}}" id="thumbnail">
      </div>
      <div class="mb-3">
        <label for="nama_layanan" class="form-label">Nama Layanan</label>
        <input type="text" class="form-control" name="nama_layanan" value="{{$data->nama_layanan}}"id="nama_layanan">
      </div>
      <div class="form-group">
        <label class="col-sm-12" for="unit">Unit</label>
        <div class="col-sm-12">
          <select class="form-control" id="unit" name="unit">
          <option value="" selected disabled>Select Unit</option>
            <option value="1">Kg</option>
            <option value="2">Pcs</option>
          </select>
        </div>
      </div>
      <!-- <div class="form-group">
        <label class="col-sm-12" for="kategori">Kategori</label>
        <div class="col-sm-12">
          <select class="form-control" id="kategori" name="kategori">
          <option value="" selected disabled>Select kategori</option>
            <option value="1">Cuci Kering</option>
            <option value="2">Setrika</option>
          </select>
        </div>
      </div> -->
      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" value="{{$data->harga}}" name="harga" id="harga">
      </div>
     
      <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
  </div>

</div>

@endsection