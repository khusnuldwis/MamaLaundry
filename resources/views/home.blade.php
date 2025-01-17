@extends('layout.app')

@section('title')
Pilih Cabang Laundry
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="text-center mb-4">
            <h1>Selamat Datang, {{ $user->name }}!</h1>
            <p class="text-muted">Anda login sebagai <strong>{{ ($user->role->name) }}</strong>.</p>
        </div>

        <div class="row mb-">
            <div class="col-sm-3 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-arrow-down"></i>
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
            <div class="col-sm-3 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-money-bill-wave"></i>
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
            <div class="col-sm-3 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-th-list"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Layanan</p>
                                    <h4 class="card-title">{{ number_format($totalLayanan, 0, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-danger bubble-shadow-small">
                                    <i class="fas fa-pen-square"></i>
                                </div>
                            </div>
                            <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Laundry Yang Belum Diambil</p>
                                    <h4 class="card-title">{{ number_format($laundryBelumDiambil, 0, ',', '.') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <a href="{{ url('/home?cabang=Jajar') }}">Lihat Cabang Jajar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <a href="{{ url('/home?cabang=Wlingi') }}">Lihat Cabang Wlingi</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <a href="{{ url('/home?cabang=Talun') }}">Lihat Cabang Talun</a>
                </div>
            </div>
        </div>
        
    </div>
</div>
<div class="container mt-5">
    <div class="card card-round">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title col-md-4">Transaksi</div>

            </div>
        </div>

        <!-- Tabel Transaksi -->
        <div class="card">
            <div class="card-body">
                <div class="container">

                    <div class="table-responsive">
                        <table id="orderTable" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Order Masuk</th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Pelanggan</th>
                                    <th>No Hp</th>
                                    <th>Total Harga</th>
                                    @if(auth()->user()->role->name === 'admin')
                                    <th>Cabang</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $item)
                                <tr>
                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $item->kode_transaksi ?? null }}</td>
                                    <td>{{ $item->nama_pelanggan}}</td>
                                    <td>{{ $item->no_hp ?? null }}</td>
                                    <td>Rp. {{ number_format($item->total_harga) ?? null }}</td>
                                    <td>{{ $item->user->cabang ?? null }}</td>

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