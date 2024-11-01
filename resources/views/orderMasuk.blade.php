
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
                    <table class="table">
                        <style>
                            table {
                                width: 100%;
                                table-layout: auto;
                                border-collapse: collapse;
                            }

                            th,
                            td {
                                padding: 8px;
                                white-space: nowrap;
                                /* Prevents text from wrapping */
                                border: 1px solid #ddd;
                            }

                            /* Optional: Add scroll if the table is too wide */
                            .table-container {
                                overflow-x: auto;
                            }
                        </style>
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
                            <tr>
                                <td>1</td>
                                <td>Ursa</td>
                                <td>081234567890</td>
                                <td>Ds. Jati, Jl. Marak</td>
                                <td>Cuci Kering</td>
                                <td>5 Kg</td>
                                <td>Sep 22, 2024</td>
                                <td>Sep 25, 2024</td>
                                <td class="status-barang">
                                    <select class="form-select status-dropdown"
                                        onchange="updateDropdownColor(this)">
                                        <option value="proses" data-color="lightsalmon">Proses
                                        </option>
                                        <option value="selesai" data-color="aquamarine">Selesai
                                        </option>
                                        <option value="diambil" data-color="darkturquoise">Diambil
                                        </option>
                                    </select>
                                </td>
                                <td class="status-pembayaran">
                                    <select class="form-select payment-dropdown"
                                        onchange="updateDropdownColor(this)">
                                        <option value="belum_dibayar" data-color="lightcoral">Belum
                                            Dibayar</option>
                                        <option value="dibayar" data-color="lightgreen">Dibayar
                                        </option>
                                    </select>
                                </td>
                                <td>Rp 50,000</td>
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
                            <tr>
                                <td>2</td>
                                <td>Rasya</td>
                                <td>081234567890</td>
                                <td>Ds. Jati, Jl. Beru</td>
                                <td>Cuci Setrika</td>
                                <td>10 Pcs</td>
                                <td>Sep 22, 2024</td>
                                <td>Sep 25, 2024</td>
                                <td class="status-barang">
                                    <select class="form-select status-dropdown"
                                        onchange="updateDropdownColor(this)">
                                        <option value="proses" data-color="lightsalmon">Proses
                                        </option>
                                        <option value="selesai" data-color="aquamarine">Selesai
                                        </option>
                                        <option value="diambil" data-color="darkturquoise">Diambil
                                        </option>
                                    </select>
                                </td>
                                <td class="status-pembayaran">
                                    <select class="form-select payment-dropdown"
                                        onchange="updateDropdownColor(this)">
                                        <option value="belum_dibayar" data-color="lightcoral">Belum
                                            Dibayar</option>
                                        <option value="dibayar" data-color="lightgreen">Dibayar
                                        </option>
                                    </select>
                                </td>
                                <td>Rp 76,000</td>
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
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="myChartLegend"></div>
        </div>
    </div>
</div>
@endsection
