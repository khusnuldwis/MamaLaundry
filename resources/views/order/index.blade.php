@extends('layout.app')

@section('title')
Order
@endsection

@section('content')
<div class="container mt-5">
    <div class="card card-round">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title col-md-4">Transaksi</div>
                @if($status == 'selesai' )
                <div class="col-md-8 text-end">
                    <strong>Total Pemasukan: </strong>@if(isset($totalHarga))
                    <p>Total Harga: {{ $totalHarga }}</p>
                    @else
                    <p>Total Harga: 0</p>
                    @endif

                </div>
                @endif <div class="card-tools">
                    <div class="ms-md-auto py-2 py-md-0 float-end">
                        @if($status == 'masuk') <!-- Kondisi untuk memeriksa status -->
                        <a href="{{ route('order.create') }}" class="btn btn-primary box-title m-b-0">Buat Transaksi</a>
                        @endif
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
                                <th>Status Layanan</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($order as $item)
                            <tr>
                                <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{ $item->kode_transaksi ?? null }}</td>
                                <td>{{ $item->nama_pelanggan}}</td>
                                <td>{{ $item->no_hp ?? null }}</td>
                                <td> Rp. {{ number_format($item->total_harga) ?? null }}</td>
                                <td>{{ $item->status_layanan ?? null }}</td>
                                <td>
                                    <div class="d-flex justify-content-start gap-2">
                                        <a href="{{ route('order.show', [$item->id]) }}" class="btn btn-label-warning btn-round btn-sm">
                                            <span class="btn-label"><i class="fa fa-eye"></i></span> Detail

                                        </a>
                                        <a href="{{ route('order.edit', [$item->id]) }}" class="btn btn-label-success btn-round btn-sm">
                                            <span class="btn-label"><i class="fa fa-pen"></i></span> Edit
                                        </a>
                                        <a href="#" onclick="confirmDelete(event, {{ $item->id }})"
                                            class="btn btn-label-danger btn-round btn-sm">
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