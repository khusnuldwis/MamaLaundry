@extends('layout.app')

@section('title')
    Pilih Cabang Laundry
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5 mb-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Cabang A</h5>
                    <p class="card-text">Pelayanan terbaik untuk wilayah Cabang A.</p>
                    {{-- <a href="{{ route('cabang.a') }}" class="btn btn-primary">Masuk ke Cabang A</a> --}}
                </div>
            </div>
        </div>
        <div class="col-md-5 mb-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Cabang B</h5>
                    <p class="card-text">Pelayanan terbaik untuk wilayah Cabang B.</p>
                    {{-- <a href="{{ route('cabang.b') }}" class="btn btn-primary">Masuk ke Cabang B</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
