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
                    <div class="col-sm-6 col-md-6">
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
                    <div class="col-sm-6 col-md-6">
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
                </div>
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
                            
                            <div class="table-responsive">
                                <table id="orderTable" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Order Masuk</th>
                                            <th>Kode Transaksi</th>
                                            <th>Nama Pelanggan</th>
                                            <th>No Hp</th>
                                            <th>Total Harga</th>
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
                                            <td>Rp. {{ number_format($item->total_harga) ?? null }}</td>
                                            <td>
                                                <div class="d-flex justify-content-start gap-2">
                                                    <a href="{{ route('order.show', [$item->id]) }}" class="btn btn-label-warning btn-round btn-sm">
                                                        <span class="btn-label"><i class="fa fa-eye"></i></span> Detail
                                                    </a>
                                                    <a href="{{ route('order.edit', [$item->id]) }}" class="btn btn-label-success btn-round btn-sm">
                                                        <span class="btn-label"><i class="fa fa-pen"></i></span> Edit
                                                    </a>
                                                    <a href="#" onclick="confirmDelete(event, {{ $item->id }})" class="btn btn-label-danger btn-round btn-sm">
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
<script>
    function loadTable(role) {
        $.ajax({
            url: '{{ route('order.getByRole') }}', // Endpoint untuk mendapatkan data berdasarkan role
            type: 'GET',
            data: { role: role },
            success: function(response) {
                // Kosongkan tabel sebelum diisi
                $('#orderTable tbody').empty();

                // Loop data dan tambahkan ke tabel
                response.data.forEach(item => {
                    $('#orderTable tbody').append(`
                        <tr>
                            <td>${item.created_at}</td>
                            <td>${item.kode_transaksi ?? ''}</td>
                            <td>${item.nama_pelanggan}</td>
                            <td>${item.no_hp ?? ''}</td>
                            <td>Rp. ${new Intl.NumberFormat('id-ID').format(item.total_harga)}</td>
                            <td>${item.status_pengerjaan ?? ''}</td>
                            <td>
                                <div class="d-flex justify-content-start gap-2">
                                    <a href="/order/${item.id}" class="btn btn-label-warning btn-round btn-sm">
                                        <span class="btn-label"><i class="fa fa-eye"></i></span> Detail
                                    </a>
                                    <a href="/order/${item.id}/edit" class="btn btn-label-success btn-round btn-sm">
                                        <span class="btn-label"><i class="fa fa-pen"></i></span> Edit
                                    </a>
                                    <a href="#" onclick="confirmDelete(event, ${item.id})" class="btn btn-label-danger btn-round btn-sm">
                                        <span class="btn-label"><i class="fa fa-trash"></i></span> Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                    `);
                });
            },
            error: function() {
                Swal.fire('Error!', 'Gagal memuat data.', 'error');
            }
        });
    }
</script>

            @endsection