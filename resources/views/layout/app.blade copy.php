<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>MamaLaundry - Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{asset('assets/img/kaiadmin/favicon.ico')}}"type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('dist/css/dataTables.css') }}">

    <!-- Fonts and icons -->
    <script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}" ></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                "families": ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" href="{{asset('assets/css/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/kaiadmin.min.css')}}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
</head>

<body>
    <div class="container">
        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom shadow-sm rounded">

            <div class="container-fluid">
		
                <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-search pe-1">
                                <i class="fa fa-search search-icon"></i>
                            </button>
                        </div>
                        <input type="text" placeholder="Search ..." class="form-control">
                    </div>
                </nav>

                <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                    <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false" aria-haspopup="true">
                            <i class="fa fa-search"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-search animated fadeIn">
                            <form class="navbar-left navbar-form nav-search">
                                <div class="input-group">
                                    <input type="text" placeholder="Search ..." class="form-control">
                                </div>
                            </form>
                        </ul>
                    </li>
                    <li class="nav-item topbar-icon dropdown hidden-caret">
                        <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-envelope"></i>
                        </a>
                        <ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
                            <li>
                                <div class="dropdown-title d-flex justify-content-between align-items-center">
                                    Messages
                                    <a href="#" class="small">Mark all as read</a>
                                </div>
                            </li>
                            <li>
                                <div class="message-notif-scroll scrollbar-outer">
                                    <div class="notif-center">
                                        <a href="#">
                                            <div class="notif-img">
                                                <img src="assets/rimg/jm_denis.jpg" alt="Img Profile">
                                            </div>
                                            <div class="notif-content">
                                                <span class="subject">Jimmy Denis</span>
                                                <span class="block">
                                                    How are you ?
                                                </span>
                                                <span class="time">5 minutes ago</span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="notif-img">
                                                <img src="assets/rimg/chadengle.jpg" alt="Img Profile">
                                            </div>
                                            <div class="notif-content">
                                                <span class="subject">Chad</span>
                                                <span class="block">
                                                    Ok, Thanks !
                                                </span>
                                                <span class="time">12 minutes ago</span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="notif-img">
                                                <img src="assets/rimg/mlane.jpg" alt="Img Profile">
                                            </div>
                                            <div class="notif-content">
                                                <span class="subject">Jhon Doe</span>
                                                <span class="block">
                                                    Ready for the meeting today...
                                                </span>
                                                <span class="time">12 minutes ago</span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="notif-img">
                                                <img src="assets/rimg/talha.jpg" alt="Img Profile">
                                            </div>
                                            <div class="notif-content">
                                                <span class="subject">Talha</span>
                                                <span class="block">
                                                    Hi, Apa Kabar ?
                                                </span>
                                                <span class="time">17 minutes ago</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="see-all" href="javascript:void(0);">See all messages<i
                                        class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item topbar-icon dropdown hidden-caret">
                        <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="notification">4</span>
                        </a>
                        <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                            <li>
                                <div class="dropdown-title">You have 4 new notification</div>
                            </li>
                            <li>
                                <div class="notif-scroll scrollbar-outer">
                                    <div class="notif-center">
                                        <a href="#">
                                            <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i>
                                            </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    New user registered
                                                </span>
                                                <span class="time">5 minutes ago</span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="notif-icon notif-success"> <i class="fa fa-comment"></i>
                                            </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    Rahmad commented on Admin
                                                </span>
                                                <span class="time">12 minutes ago</span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="notif-img">
                                                <img src="assets/rimg/profile2.jpg" alt="Img Profile">
                                            </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    Reza send messages to you
                                                </span>
                                                <span class="time">12 minutes ago</span>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    Farrah liked Admin
                                                </span>
                                                <span class="time">17 minutes ago</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="see-all" href="javascript:void(0);">See all notifications<i
                                        class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item topbar-icon dropdown hidden-caret">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fas fa-layer-group"></i>
                        </a>
                        <div class="dropdown-menu quick-actions animated fadeIn">
                            <div class="quick-actions-header">
                                <span class="title mb-1">Quick Actions</span>
                                <span class="subtitle op-7">Shortcuts</span>
                            </div>
                            <div class="quick-actions-scroll scrollbar-outer">
                                <div class="quick-actions-items">
                                    <div class="row m-0">
                                        <a class="col-6 col-md-4 p-0" href="#">
                                            <div class="quick-actions-item">
                                                <div class="avatar-item bg-danger rounded-circle">
                                                    <i class="far fa-calendar-alt"></i>
                                                </div>
                                                <span class="text">Calendar</span>
                                            </div>
                                        </a>
                                        <a class="col-6 col-md-4 p-0" href="#">
                                            <div class="quick-actions-item">
                                                <div class="avatar-item bg-warning rounded-circle">
                                                    <i class="fas fa-map"></i>
                                                </div>
                                                <span class="text">Maps</span>
                                            </div>
                                        </a>
                                        <a class="col-6 col-md-4 p-0" href="#">
                                            <div class="quick-actions-item">
                                                <div class="avatar-item bg-info rounded-circle">
                                                    <i class="fas fa-file-excel"></i>
                                                </div>
                                                <span class="text">Reports</span>
                                            </div>
                                        </a>
                                        <a class="col-6 col-md-4 p-0" href="#">
                                            <div class="quick-actions-item">
                                                <div class="avatar-item bg-success rounded-circle">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                                <span class="text">Emails</span>
                                            </div>
                                        </a>
                                        <a class="col-6 col-md-4 p-0" href="#">
                                            <div class="quick-actions-item">
                                                <div class="avatar-item bg-primary rounded-circle">
                                                    <i class="fas fa-file-invoice-dollar"></i>
                                                </div>
                                                <span class="text">Invoice</span>
                                            </div>
                                        </a>
                                        <a class="col-6 col-md-4 p-0" href="#">
                                            <div class="quick-actions-item">
                                                <div class="avatar-item bg-secondary rounded-circle">
                                                    <i class="fas fa-credit-card"></i>
                                                </div>
                                                <span class="text">Payments</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                    <li class="nav-item topbar-user dropdown hidden-caret">
    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
        <div class="avatar-sm">
            <img src="assets/rimg/profile.jpg" alt="Profile Image" class="avatar-img rounded-circle">
        </div>
        <span class="profile-username">
            <span class="op-7">Hi,</span> <span class="fw-bold">{{ Auth::user()->name }}</span>
        </span>
    </a>
    <ul class="dropdown-menu dropdown-user animated fadeIn">
        <div class="dropdown-user-scroll scrollbar-outer">
            <li>
                <div class="user-box">
                    <div class="avatar-lg">
                        <img src="assets/rimg/profile.jpg" alt="Profile Image" class="avatar-img rounded">
                    </div>
                    <div class="u-text">
                        <h4>{{ Auth::user()->name }}</h4>
                        <p class="text-muted">{{ Auth::user()->email }}</p>
                        <a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">My Profile</a>
                <a class="dropdown-item" href="#">My Balance</a>
                <a class="dropdown-item" href="#">Inbox</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Account Setting</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </div>
    </ul>
</li>

                                </li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>

    <div class="container">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Dashboard</h3>
                    <!-- <h6 class="op-7 mb-2">Free Bootstrap 5 Admin Dashboard</h6> -->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-3 mt-3">
                    <a href="/orderMasuk" class="btn btn-outline-primary btn-lg w-100 text-start" style="border-radius: 15px;">
                        <div class="d-flex align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ps-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-title">Orderan Masuk</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-sm-4 col-md-3 mt-3">
                    <a href="/layanan" class="btn btn-outline-info btn-lg w-100 text-start" style="border-radius: 15px;">
                        <div class="d-flex align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col col-stats ps-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-title">Layanan</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-sm-4 col-md-3 mt-3">
                    <a href="/kategori" class="btn btn-outline-info btn-lg w-100 text-start" style="border-radius: 15px;">
                        <div class="d-flex align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col col-stats ps-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-title">Kategori</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-sm-4 col-md-3 mt-3">
                <a href="{{ route('orderMasuk.belumDiambil') }}" class="btn btn-warning btn-round">
    Filter Belum Diambil
</a>
                        <div class="d-flex align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-warning bubble-shadow-small">
                                    <i class="fas fa-luggage-cart"></i>
                                </div>
                            </div>
                            <div class="col col-stats ps-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-title">Belum Diambil</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>
            <br>
            @yield('content')
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah/Edit Pelanggan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pelanggan</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Pelanggan">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Pelanggan">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No Hp</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Hp Pelanggan">
                            </div>
                            
                            <div class="mb-3 row">
                            <label for="category_id" class="col-sm-4 col-form-label">Pilih Metode</label>
                            <div class="col-sm-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="metode_layanan_id" id="metode_layanan_id" value="option1">
                                    <label class="form-check-label" for="metode_layanan_id"></label>
                                 </div>
                               
                            </div>
                        </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#layanan">Pilih Layanan -></button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Pilih Layanan -->
        <div class="modal fade" id="layanan" tabindex="-1" aria-labelledby="layananLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="layananLabel">Daftar Layanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row" id="card-container">
                                <!-- Cards layanan akan dirender di sini -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal">Back to first</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Input Quantity -->
        <div class="modal fade" id="quantityModal" tabindex="-1" aria-labelledby="quantityModalLabel"  aria-hidden="true">
            <div class="modal-dialog modal-sm"> <!-- Kelas modal-sm untuk ukuran kecil -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="smallModalLabel">Small Modal Title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div id="layanan-info" class="mb-3 text-start">
                        <h5 id="layanan-name" class="fw-bold">Nama Item</h5>
                        <p id="layanan-category" class="text-muted">Kategori</p>
                        <p id="layanan-jenis_layanan" class="text-muted">Jenis Layanan</p>
                    </div>

                            <form>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Kuantitas</label>
                                <input type="number" class="form-control" id="quantity" name="quantity">
                            </div>
                            
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <footer>
			<div class="card card-round">
				<div class="card-header">
					<div class="card-head-row card-tools-still-right">
						<div class="copyright">
							2024, dibuat <i class="fa fa-heart heart text-danger"></i> oleh Kelompok PKK</a>
						</div>
					</div>
				</div>
			</div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!--   Core JS Files   -->
    <script src="{{asset('assets//core/jquery-3.7.1.min.')}}"></script>
    <script src="{{asset('assets//core/popper.min.')}}"></script>
    <script src="{{asset('assets//core/bootstrap.min.')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{asset('assets//plugin/jquery-scrollbar/jquery.scrollbar.min.')}}"></script>

    <!-- Chart JS -->
    <script src="{{asset('assets//plugin/chart.js/chart.min.')}}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{asset('assets//plugin/jquery.sparkline/jquery.sparkline.min.')}}"></script>

    <!-- Chart Circle -->
    <script src="{{asset('assets//plugin/chart-circle/circles.min.')}}"></script>

    <!-- Datatables -->
    <script src="{{asset('assets//plugin/datatables/datatables.min.')}}"></script>

    <!-- Bootstrap Notify -->
    {{-- <script src="{{asset('assets//plugin/bootstrap-notify/bootstrap-notify.min.')}}"></script> --}}

    <!-- jQuery Vector Maps -->
    <script src="{{asset('assets//plugin/jsvectormap/jsvectormap.min.')}}"></script>
    <script src="{{asset('assets//plugin/jsvectormap/world.')}}"></script>

    <!-- Sweet Alert -->
    <script src="{{asset('assets//plugin/sweetalert/sweetalert.min.')}}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{asset('assets//kaiadmin.min.')}}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{asset('assets//setting-demo.')}}"></script>
    <script src="{{asset('assets//demo.')}}"></script>
    <script src="{{ url('dist/js/jquery1.js') }}"></script>
    <script src="{{ url('dist/js/Tables.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
    <script>
    $(document).ready(function() {
        const jenisLayananMapping = {
            1: 'Reguler',
            2: 'Kilat',
            3: 'Express'
        };
        const unitMapping = {
            1: 'Kg',
            2: 'Pcs'
        };

        // Fetch data layanan
        const fetchLayanan = () => {
            $.ajax({
                url: '/api/layanans', // Endpoint API
                method: 'GET',
                success: data => {
                    const container = $('#card-container');
                    container.empty();
                    data.forEach(layanan => {
                        // Menyertakan data layanan dalam atribut data-layanan
                        container.append(`
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="card h-100 shadow-lg border-0 rounded-4 layanan-card" data-id="${layanan.id}">
                                    <div class="position-relative">
                                        <img src="/storage/${layanan.thumbnail}" class="card-img-top rounded-top" alt="Thumbnail Layanan" 
                                            style="width: 100%; height: 180px; object-fit: cover;">
                                    </div>
                                    <div class="card-body d-flex flex-column justify-content-between p-3">
                                        <h5 class="card-title text-center fw-bold text-truncate mb-2" style="font-size: 1.1rem; line-height: 1.4;">
                                            ${layanan.nama_layanan}
                                        </h5>
                                        <div class="text-center mb-3">
                                            <span class="badge text-bg-light px-4 py-2 rounded-pill" style="font-size: 0.9rem; font-weight: 500; color: #495057;">
                                                ${layanan.category?.nama_kategori || 'N/A'}
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <span class="badge bg-primary py-2 px-4 rounded-pill" style="font-size: 0.9rem; font-weight: 500;">
                                                ${jenisLayananMapping[layanan.jenis_layanan] || 'N/A'}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                },
                error: () => Swal.fire({
                    icon: 'error',
                    title: 'Gagal Memuat',
                    text: 'Tidak dapat memuat data layanan.'
                })
            });
        };

        // Panggil fetchLayanan saat modal layanan dibuka
        $('#layanan').on('show.bs.modal', function() {
            fetchLayanan();
        });

        // Menangani klik pada card layanan
        $(document).on('click', '.layanan-card', function () {
            const layananId = $(this).data('id'); // Ambil ID layanan dari card

            // Memanggil API untuk mengambil detail layanan berdasarkan ID
            $.ajax({
                url: `/api/layanans/${layananId}`, // Ganti dengan endpoint API yang sesuai
                method: 'GET',
                success: layanan => {
                    // Mengisi informasi layanan ke modal
                    $('#layanan-name').text(layanan.nama_layanan || 'Nama Layanan Tidak Ditemukan');
                    $('#layanan-category').text(layanan.category?.nama_kategori || 'N/A');
                    $('#layanan-jenis_layanan').text(` ${jenisLayananMapping[layanan.jenis_layanan] || 'N/A'}`);

                    // Tampilkan modal kuantitas
                    $('#quantityModal').modal('show');
                },
                error: () => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Memuat Detail',
                        text: 'Tidak dapat memuat detail layanan.'
                    });
                }
            });
        });
    });
</script>

    </script>

    <script>
        $('#lineChart').sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#177dff',
            fillColor: 'rgba(23, 125, 255, 0.14)'
        });

        $('#lineChart2').sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#f3545d',
            fillColor: 'rgba(243, 84, 93, .14)'
        });

        $('#lineChart3').sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#ffa534',
            fillColor: 'rgba(255, 165, 52, .14)'
        });
    </script>
    <!-- perubahan warna select -->
    <style>
        /* Tambahkan warna background untuk opsi yang dipilih */
        select.form-select option[value="proses"] {
            background-color: lightsalmon;
        }

        select.form-select option[value="selesai"] {
            background-color: aquamarine;
        }

        select.form-select option[value="diambil"] {
            background-color: darkturquoise;
        }

        select.form-select option[value="belum_dibayar"] {
            background-color: lightcoral;
        }

        select.form-select option[value="dibayar"] {
            background-color: lightgreen;
        }
    </style>
    <!-- perubahan warna select  -->
    <script>
        // Fungsi untuk memperbarui warna dropdown
        function updateDropdownColor(selectElement) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const color = selectedOption.getAttribute('data-color');

            // Ubah warna latar belakang dropdown
            selectElement.style.backgroundColor = color;
        }

        // Memastikan setiap dropdown memiliki warna yang sesuai saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const dropdowns = document.querySelectorAll('.status-dropdown, .payment-dropdown');
            dropdowns.forEach(function(dropdown) {
                updateDropdownColor(dropdown);
            });
        });
    </script>
</body>

</html>
