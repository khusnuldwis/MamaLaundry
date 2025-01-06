@extends('layout.app2')

@section('title')
    Create Order
@endsection

@section('content')
<div class="container mt-4">
    <div class="card card-round">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title">Buat Transaksi</div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="container p-4">
            <form id="orderForm" action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Order Section -->
                    <div class="col-md-12">
                        <h4>Informasi Pelanggan</h4>

                        <!-- Nama Pelanggan -->
                        <div class="form-group">
                            <label for="nama_pelanggan">Nama</label>
                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Input Nama" required>
                        </div>

                        <!-- Nomor HP -->
                        <div class="form-group">
                            <label for="no_hp">Nomor HP</label>
                            <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="Input Nomor HP" required>
                        </div>

                        <!-- Tanggal Selesai -->
                        <div class="form-group">
                            <label for="tanggal_selesai">Tanggal Selesai</label>
                            <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="form-control" required>
                        </div>

                        <!-- Status Pembayaran -->
                        <div class="form-group">
                            <label for="status_pembayaran">Status Pembayaran</label>
                            <select class="form-control" id="status_pembayaran" name="status_pembayaran" required>
                                <option selected>Pilih Status Pembayaran</option>
                                <option value="Belum Dibayar">Belum Dibayar</option>
                                <option value="Lunas">Lunas</option>
                            </select>
                        </div>

                        <!-- Status Pengerjaan -->
                        <div class="form-group">
                            <label for="status_pengerjaan">Status Pengerjaan</label>
                            <select class="form-control" id="status_pengerjaan" name="status_pengerjaan" required>
                                <option selected>Pilih Status Pengerjaan</option>
                                <option value="masuk">Masuk</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                                <option value="diambil">Diambil</option>
                            </select>
                        </div>
                    </div>

                    <!-- Order Detail Section -->
                    <div class="col-md-12 mt-4">
                        <h4>Detail Layanan</h4>
                        <div id="listProd">
                            <div class="row">
                                <!-- Layanan -->
                                <div class="col-md-8 form-group">
                                    <label for="layanan_id">Layanan</label>
                                    <select name="layanan_id[]" class="form-control" required>
                                        @foreach ($layanan as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama_layanan }} - {{ $jenisLayananMapping[$item->jenis_layanan] ?? 'N/A' }} - {{ $item->category->jenis_kategori ?? 'N/A' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Berat -->
                                <div class="col-md-4 form-group">
                                    <label for="berat_item">Berat</label>
                                    <div class="d-flex">
                                        <input type="number" class="form-control" value="1" name="berat_item[]" placeholder="Input Berat" required>
                                        <select name="berat_satuan[]" class="form-control ml-2" style="width: auto;">
                                            <option value="kg">Kg</option>
                                            <option value="pcs">Pcs</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Product List -->
                        <div id="elemProd"></div>

                        <!-- Tambah Layanan Button -->
                        <button class="btn btn-warning mt-3" type="button" onclick="appendDetailProd()">Tambah Layanan</button>

                        <!-- Metode Layanan -->
                        <div class="form-group mt-4">
                            <label for="metode_layanan_id">Metode Layanan</label>
                            <select class="form-control" id="metode_layanan_id" name="metode_layanan_id" required>
                                <option value="" selected disabled>Pilih</option>
                                @foreach ($metode_layanan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_metode_layanan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Submit and Reset Buttons -->
                <div class="text-end mt-3">
        <a href="{{ route('order.index') }}" class="btn btn-danger float-left" style="background-color: #eb3a3a; border-color: #eb3a3a;">Kembali</a>
   <button type="submit" class="btn btn-primary">Simpan</button>
</div>
        <!-- Loading Indicator -->
                <div id="loadingIndicator" class="text-center mt-3" style="display: none;">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Processing...
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<script>
    function appendDetailProd() {
        var element = $('#listProd').html();
        $('#elemProd').append(element);
    }

    $(document).ready(function () {
        $('#orderForm').on('submit', function () {
            $('#loadingIndicator').show(); // Tampilkan indikator loading saat submit
        });
    });
</script>
