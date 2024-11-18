@extends('layout.app')

@section('title', 'Single Tabel')

@section('content')
<div class="mt-5">
    <h1 class="text-white">List Layanan</h1>
    <div class="mt-5">
        <div class="card">
            <div class="card-header">
                Layanan
                <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-jenis="Tambah">Tambah</button>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row" id="card-container">
                        <!-- Cards akan dirender di sini -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="dataForm">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach([
                            ['thumbnail', 'Gambar Layanan', 'file', 'Masukkan gambar layanan'],
                            ['nama_layanan', 'Nama Layanan', 'text', 'Masukkan nama layanan'],
                            ['harga', 'Harga', 'text', 'Masukkan harga layanan']
                        ] as $field)
                        <div class="mb-3 row">
                            <label for="{{ $field[0] }}" class="col-sm-4 col-form-label">{{ $field[1] }}</label>
                            <div class="col-sm-8">
                                <input type="{{ $field[2] }}" class="form-control" id="{{ $field[0] }}" name="{{ $field[0] }}" placeholder="{{ $field[3] }}">
                            </div>
                        </div>
                        @endforeach

                        @foreach([
                            ['jenis_layanan', 'Jenis Layanan', [1 => 'Reguler', 2 => 'Kilat', 3 => 'Express']],
                            ['unit', 'Unit', [1 => 'Kg', 2 => 'Pcs']]
                        ] as $field)
                        <div class="mb-3 row">
                            <label for="{{ $field[0] }}" class="col-sm-4 col-form-label">{{ $field[1] }}</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="{{ $field[0] }}" name="{{ $field[0] }}">
                                    <option value="">Pilih {{ $field[1] }}</option>
                                    @foreach($field[2] as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endforeach

                        <div class="mb-3 row">
                            <label for="category_id" class="col-sm-4 col-form-label">Kategori</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="category_id" name="category_id">
                                    <option value="">Pilih Kategori</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Scripts -->
<script src="{{ url('dist/js/jquery1.js') }}"></script>
<script src="{{ url('dist/js/Tables.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function () {
        const jenisLayananMapping = { 1: 'Reguler', 2: 'Kilat', 3: 'Express' };
        const unitMapping = { 1: 'Kg', 2: 'Pcs' };

        const fetchCategories = () => {
            $.ajax({
                url: '/api/categorys',
                method: 'GET',
                success: data => {
                    const categorySelect = $('#category_id');
                    categorySelect.empty().append('<option value="">Pilih Kategori</option>');
                    data.forEach(category => categorySelect.append(`<option value="${category.id}">${category.nama_kategori}</option>`));
                },
                error: () => console.error('Gagal memuat kategori.')
            });
        };

        const fetchLayanan = () => {
            $.ajax({
                url: '/api/layanans',
                method: 'GET',
                success: data => {
                    const container = $('#card-container');
                    container.empty();
                    data.forEach(layanan => {
                        container.append(`
                           <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm border-0">
                                    <div class="position-relative">
                                        <img src="/storage/${layanan.thumbnail}" class="card-img-top rounded-top" alt="Thumbnail" style="width:100%; height: 200px; object-fit: cover;">
                                        <span class="badge bg-primary position-absolute top-0 start-0 m-2" style="font-size: 0.85rem;">
                                            ${jenisLayananMapping[layanan.jenis_layanan] || 'N/A'}
                                        </span>
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <h5 class="card-title text-center fw-bold">${layanan.nama_layanan}</h5>
                                        <p class="card-text text-muted">
                                            <strong>Kategori:</strong> ${layanan.category?.nama_kategori || 'N/A'}<br>
                                            <strong>Harga:</strong> 
                                            <span class="text-success fw-semibold">Rp ${layanan.harga}</span> 
                                            <small>/ ${unitMapping[layanan.unit] || 'N/A'}</small>
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-warning btn-sm w-48" data-bs-toggle="modal" 
                                                data-bs-target="#exampleModal" data-bs-jenis="Ubah" data-bs-id="${layanan.id}">
                                                <i class="fas fa-edit"></i> Ubah
                                            </button>
                                            <button class="btn btn-danger btn-sm w-48" onclick="hapusData(${layanan.id})">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        `);
                    });
                },
                error: () => console.error('Gagal memuat layanan.')
            });
        };

        const hapusData = id => {
            Swal.fire({
                title: "Bener Mau Hapus?",
                text: "Data tidak dapat dikembalikan setelah dihapus.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus!"
            }).then(result => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/api/layanans/${id}`,
                        method: 'DELETE',
                        success: () => Swal.fire({ title: "Berhasil!", text: "Data dihapus.", icon: "success" }).then(fetchLayanan),
                        error: () => Swal.fire({ title: "Gagal!", text: "Tidak dapat menghapus data.", icon: "error" })
                    });
                }
            });
        };

        window.hapusData = hapusData;

        // Modal Show Event Listener
        const targetModal = document.getElementById('exampleModal');
        let setIdlayanan = null;

        if (targetModal) {
            targetModal.addEventListener('show.bs.modal', event => {
                const button = event.relatedTarget;
                const jenisModal = button.getAttribute('data-bs-jenis');
                setIdlayanan = button.getAttribute('data-bs-id');

                if (jenisModal === "Ubah") {
                    $.ajax({
                        url: '/api/layanans/' + setIdlayanan,
                        method: 'GET',
                        success: function(data) {
                            $('#nama_layanan').val(data.data.nama_layanan);
                            $('#jenis_layanan').val(data.data.jenis_layanan);
                            $('#unit').val(data.data.unit);
                            $('#harga').val(data.data.harga);
                            $('#category_id').val(data.data.category_id);

                            $('#pr_thumbnail').remove();
                            if (data.data.thumbnail) {
                                $('#thumbnail').after(
                                    `<div id="pr_thumbnail"><img src="/storage/${data.data.thumbnail}" width="30px"></div>`
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching data for edit:', error);
                        }
                    });
                } else {
                    $('#thumbnail').val('');
                    $('#unit').val('');
                    $('#harga').val('');
                    $('#nama_layanan').val('');
                    $('#jenis_layanan').val('');
                    $('#category_id').val('');
                    setIdlayanan = null;
                    $('#pr_thumbnail').remove();
                }

                const modalTitle = targetModal.querySelector('.modal-title');
                modalTitle.textContent = `${jenisModal} Layanan`;
            });
        }

        // Submit form untuk tambah dan ubah
        $("#dataForm").submit(function(event) {
            event.preventDefault();
            let formData = new FormData(this);
            let sendData = '/api/layanans/';
            let setMethod = 'POST';

            if (setIdlayanan) {
                sendData += setIdlayanan;
                setMethod = 'POST'; 
                formData.append('_method', 'PUT');
            }

            $.ajax({
                url: sendData,
                method: setMethod,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    Swal.fire({
                        title: "Sukses!",
                        text: response.pesan || "Data berhasil disimpan.",
                        icon: "success",
                        timer: 2000,
                        timerProgressBar: true,
                        didClose: () => {
                            location.reload(); // Refresh DataTable
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error saving data:', error);
                    Swal.fire({
                        title: "Gagal!",
                        text: "Terjadi kesalahan saat menyimpan data: " + xhr.responseJSON.pesan,
                        icon: "error"
                    });
                }
            });
        });


        fetchCategories();
        fetchLayanan();
    });
</script>

@endsection
