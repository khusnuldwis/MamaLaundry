@extends('layouts.admin')

@section('title')
    Create Order
@endsection

@section('content')
    <div class="white-box">
        <h3 class="box-title m-b-0">Create Order</h3>
        <p class="text-muted m-b-30 font-13"> Create Order </p>
        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <h4>Order</h4>
                    <div class="form-group">
                        <label class="col-md-12">Nama</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nama_pelanggan" placeholder="Input Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="no_hp">Nomor HP</label>
                        <div class="col-md-12">
                            <input type="text" id="no_hp" name="no_hp" class="form-control"
                                placeholder="Input no_hp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="tanggal_selesai">Tanggal Selesai</label>
                        <div class="col-md-12">
                            <input type="text" id="tanggal_selesai" name="tanggal_selesai" class="form-control"
                                placeholder="Input tanggal_selesai">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12" for="status_pembayaran">Status Pembayaran</label>
                        <div class="col-md-12">
                        <select class="form-control" id="status_pembayaran" name="status_pembayaran">
                            <option value="Belum Dibayar">Belum Dibayar</option>
                            <option value="Lunas">Lunas</option>
                        </select>
                        </div>
                    </div>
            
                    
                </div>
                <div class="col-md-12">
                    <h4>Order Detail </h4>
                    <div class="row mb-5">
                        <div id="listProd">
                            <div class="col-md-8 form-group">
                                <label class="col-md-12">Layanan</label>
                                <select name="layanan_id[]" class="form-control">
                                    @foreach ($layanan as $key => $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_layanan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 form-group">
                                <div class="form-group">
                                    <label class="col-md-12">Berat</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" value="1" name="berat_item[]"
                                            placeholder="Input Tag">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="elemProd"></div>
                        <div class="form-group ">
                            <label class="col-md-12">Metode Layanan</label>
                            <div class="col-md-12">
                                <select class="form-control" id="metode_layanan_id" name="metode_layanan_id">
                                    <option value="" selected disabled>Pilih</option>
                                    @foreach ($metode_layanan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_metode_layanan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary m-b-15" type="button" onclick="appendDetailProd()">Tambah Item</button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
@push('js')
    <script>
        function appendDetailProd() {
            var element = $('#listProd').html();
            $('#elemProd').append(element);
        }
    </script>
@endpush
