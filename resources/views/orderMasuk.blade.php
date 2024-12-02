@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-round">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Data Masuk</div>
                    <div class="card-tools">
                        <a href="#" class="btn btn-label-success btn-round btn-sm me-2">
                            <span class="btn-label">
                                <i class="fa fa-pencil"></i>
                            </span>
                            Export
                        </a>
                        <a href="#" class="btn btn-label-info btn-round btn-sm">
                            <span class="btn-label">
                                <i class="fa fa-print"></i>
                            </span>
                            Print
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="table-responsive table-hover table-sales">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Layanan</th>
                                <th>Berat</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Tanggal Selesai</th>
                                <th>Status Barang</th>
                                <th>Status Pembayaran</th>
                                <th>Total Pembayaran</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $index => $trans)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $trans->nama_pelanggan }}</td>
                                <td>{{ $trans->no_hp }}</td>
                                <td>{{ $trans->alamat }}</td>
                                <td>{{ $trans->layanan }}</td>
                                <td>{{ $trans->berat }}</td>
                                <td>{{ $trans->tanggal_pemesanan }}</td>
                                <td>{{ $trans->tanggal_selesai }}</td>
                                <td>
                                    <select class="form-select status-dropdown" onchange="updateDropdownColor(this)">
                                        <option value="proses" data-color="lightsalmon">Proses</option>
                                        <option value="selesai" data-color="aquamarine">Selesai</option>
                                        <option value="diambil" data-color="darkturquoise">Diambil</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-select payment-dropdown" onchange="updateDropdownColor(this)">
                                        <option value="belum_dibayar" data-color="lightcoral">Belum Dibayar</option>
                                        <option value="dibayar" data-color="lightgreen">Dibayar</option>
                                    </select>
                                </td>
                                <td>{{ $trans->total_pembayaran }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button class="btn btn-icon btn-round btn-primary btn-sm me-2">
                                                <i class="fa fa-print"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <button class="btn btn-icon btn-round btn-warning btn-sm me-2">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="myChartLegend"></div>
        </div>
    </div>
</div>
@endsection