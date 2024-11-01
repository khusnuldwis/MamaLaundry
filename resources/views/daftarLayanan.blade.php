@extends('layout.app')

@section('title', 'Data Orderan')

@section('content')
<div class="row">
<div class="card card-round">
    <div class="card-header">
        <div class="card-head-row">
            <div class="card-title">Data Pesanan</div>
            <div class="card-tools">
                <div class="ms-md-auto py-2 py-md-0 float-end">
                    
                    <a href="#" class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#addLayananModal">Add Layanan</a>

                    <!-- Add Layanan Modal -->
                    <div class="modal fade" id="addLayananModal" tabindex="-1" aria-labelledby="addLayananModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addLayananModalLabel">Add Layanan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="thumbnail" class="form-label">No</label>
                                            <input type="number" class="form-control" name="thumbnail" id="thumbnail">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_layanan" class="form-label">Nama Pelanggan</label>
                                            <input type="text" class="form-control" name="nama_layanan" id="nama_layanan">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jenis_layanan" class="form-label">No Hp</label>
                                            <input type="number" class="form-control" name="jenis_layanan" id="jenis_layanan">
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" id="alamat">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_layanan" class="form-label">Nama Layanan</label>
                                            <input type="text" class="form-control" name="nama_layanan" id="nama_layanan">
                                        </div>
                                        <div class="mb-3">
                                            <label for="unit" class="form-label">Berat</label>
                                            <select class="form-control" id="unit" name="unit">
                                                <option value="" selected disabled>Select Unit</option>
                                                <option value="1">Kg</option>
                                                <option value="2">Pcs</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal_pemesanan" class="form-label">Tanggal Pemesanan</label>
                                            <input type="date" class="form-control" name="tanggal_pemesanan" id="tanggal_pemesanan">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                            <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai">
                                        </div>
                                        <div class="mb-3">
                                            <label for="status_barang" class="form-label">Status Barang</label>
                                            <input type="text" class="form-control" name="status_barang" id="status_barang">
                                        </div>
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Kategori</label>
                                            <select class="form-control" id="kategori" name="kategori">
                                                <option value="" selected disabled>Select kategori</option>
                                                <option value="1">Cuci Kering</option>
                                                <option value="2">Setrika</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga" class="form-label">Harga</label>
                                            <input type="number" class="form-control" name="harga" id="harga">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Add Layanan Modal -->
                </div>
            </div>
        </div>
    </div>
</div>


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
</div>
@endsection
