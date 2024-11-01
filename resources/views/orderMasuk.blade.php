@extends('layout.app')

@section('title', 'Data Orderan')

@section('content')
<div class="row">
    <div class="card card-round">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title">Data Pesanan</div>
                <div class="card-tools">
                    <a href="#" class="btn btn-primary btn-round">Tambah Layanan</a>
                </div>
            </div>
        </div>
    </div>
Order Masuk
    <!-- Laundry Service Section -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Baju</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Laundry Service Cards (Reusable Component) -->
                    @foreach(['Express', 'Kilat', 'Reguler'] as $service)
                    <div class="col-4">
                        <div class="card" data-bs-toggle="{{ $service == 'Reguler' ? 'modal' : '' }}" data-bs-target="{{ $service == 'Reguler' ? '#staticBackdrop' : '' }}">
                            <div class="card-body text-center">
                                <img src="https://png.pngtree.com/png-clipart/20211115/original/pngtree-stacked-clothes-exquisite-clothes-cotton-long-sleeve-brand-png-image_6926601.png"
                                     alt="{{ $service }}" width="80px" class="img-fluid mb-3">
                                <span><b>{{ $service }}</b></span><br>
                                <span>Harga: Rp 5000</span><br>
                                <span>Hari: 3 hari</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Service Selection -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Baju (Reguler)</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="serviceOptions" id="dryClean" value="Cuci Kering">
                        <label class="form-check-label" for="dryClean">Cuci Kering</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="serviceOptions" id="washIron" value="Cuci Setrika">
                        <label class="form-check-label" for="washIron">Cuci Setrika</label>
                    </div>
                    <div class="px-3 mb-3">
                        <label for="quantity" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="quantity" aria-describedby="quantityHelp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Blanket Service Section -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Selimut</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Reusing Service Cards Component -->
                    @foreach(['Express', 'Kilat', 'Reguler'] as $service)
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDshbRkIeMsncnrfwEN8KpSXR8hrzcEQp_Gg&s"
                                     alt="{{ $service }}" width="80px" class="img-fluid mb-3">
                                <span><b>{{ $service }}</b></span><br>
                                <span>Harga: Rp 5000</span><br>
                                <span>Hari: 3 hari</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tristate Chart</div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center p-3">
                    <div id="sparktristateChart"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Discrete Chart</div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center p-3">
                    <div id="discreteChart"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Pie Chart</div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center p-3">
                    <div id="pieChart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
