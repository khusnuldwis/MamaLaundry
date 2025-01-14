@extends('layout.app')

@section('title')
    Pilih Cabang Laundry
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        @if(auth()->user()->role_id == 2)
            <div class="col-md-5 mb-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Cabang A</h5>
                        <p class="card-text">Pelayanan terbaik untuk wilayah Cabang A.</p>
                        {{-- <a href="{{ route('cabang.a') }}" class="btn btn-primary">Masuk ke Cabang A</a> --}}
                    </div>
                </div>
            </div>
        @elseif(auth()->user()->role_id == 3)
            <div class="col-md-5 mb-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Cabang B</h5>
                        <p class="card-text">Pelayanan terbaik untuk wilayah Cabang B.</p>
                        {{-- <a href="{{ route('cabang.b') }}" class="btn btn-primary">Masuk ke Cabang B</a> --}}
                    </div>
                </div>
            </div>
        @else
        <div class="text-center mb-4">
        <h1>Selamat Datang, {{ $user->name }}!</h1>
        <p class="text-muted">Anda login sebagai <strong>{{ ($user->role->name) }}</strong>.</p>
    </div>
    <div class="row">
    <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">User Jajar</h5>
                    <p class="card-text">
                        <a href="" >lihat user jajar</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Card Lainnya -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">User Wlingi</h5>
                    <p class="card-text">
                        <a href="" >lihat user wlingi</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
            <div class="row mb-">
                <div class="col-sm-6 col-md-6">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Transaksi Hari Ini</p>
                                        <h4 class="card-title">{{ number_format($totalTransaksiHariIni, 0, ',', '.') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                        <i class="fas fa-user-check"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Pemasukan Hari Ini</p>
                                        <h4 class="card-title">Rp {{ number_format($totalPendapatanHariIni, 0, ',', '.') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            

            <!-- <div class="row">
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
            </div> -->
            @endif
    </div>
</div>
<div class="container mt-5">
    <div class="card card-round">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title col-md-4">Transaksi</div>
              
                <div class="col-md-8 text-end">
   <div class="card-tools">
                    <div class="ms-md-auto py-2 py-md-0 float-end">
                        <a href="{{ route('order.create') }}" class="btn btn-primary box-title m-b-0">Buat Transaksi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Transaksi -->
    <div class="card">
        <div class="card-body">
            <div class="container">
            @if(auth()->user()->role_id != 1)
                <h4>Cabang: {{ auth()->user()->name }}</h4>
            @else
                <h4>Semua Cabang</h4>
            @endif
                <div class="table-responsive">
                    <table id="orderTable" class="display nowrap" cellspacing="0" width="100%">


                        <thead>
                            <tr>
                                <th>Order Masuk,</th>

                                <th>Kode Transaksi</th>
                                <th>Nama Pelanggan</th>
                                <th>No Hp</th>
                                <th>Total Harga</th>
                                <th>Status Pengerjaan</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($transaksi as $item)
                            <tr>
                                <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $item->kode_transaksi ?? null }}</td>
                                <td>{{ $item->nama_pelanggan}}</td>
                                <td>{{ $item->no_hp ?? null }}</td>
                                <td> Rp. {{ number_format($item->total_harga) ?? null }}</td>
                                <td>{{ $item->status_pengerjaan ?? null }}</td>
                                <td>
                                <div class="d-flex justify-content-start gap-2">
                                    <a href="{{ route('order.show', [$item->id]) }}" class="btn btn-label-warning btn-round btn-sm" >
                                    <span class="btn-label"><i class="fa fa-eye"></i></span> Detail
                                    
                                    </a>
                                    <a href="{{ route('order.edit', [$item->id]) }}" class="btn btn-label-success btn-round btn-sm">
                                    <span class="btn-label"><i class="fa fa-pen"></i></span> Edit
                                    </a>
                                    <a href="#" onclick="confirmDelete(event, {{ $item->id }})"
                                    class="btn btn-label-danger btn-round btn-sm" >
                                    <span class="btn-label"><i class="fa fa-trash"></i></span> Hapus
                                    </a>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ url('dist/js/jquery1.js') }}"></script>
<script src="{{ url('dist/js/Tables.js') }}"></script>
<!-- CSS DataTables -->
<!-- CSS DataTables -->



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        new DataTable('#orderTable');
    })
</script>
<script>
    function confirmDelete(event, id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this record!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                var postForm = {
                    '_token': '{{ csrf_token() }}',
                    '_method': 'DELETE',
                };
                $.ajax({
                        url: 'order/' + id,
                        type: 'POST',
                        data: postForm,
                        dataType: 'json',
                    })
                    .done(function(data) {
                        Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
                        location.reload();
                    })
                    .fail(function() {
                        Swal.fire('Error!', 'An error occurred while deleting the record.', 'error');
                    });
            }
        });
    }
</script>
@endsection