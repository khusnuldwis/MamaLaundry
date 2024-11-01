<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>MamaLaundry - Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
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
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
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
                                                <img src="assets/img/jm_denis.jpg" alt="Img Profile">
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
                                                <img src="assets/img/chadengle.jpg" alt="Img Profile">
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
                                                <img src="assets/img/mlane.jpg" alt="Img Profile">
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
                                                <img src="assets/img/talha.jpg" alt="Img Profile">
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
                                                <img src="assets/img/profile2.jpg" alt="Img Profile">
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
                        <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                            aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                            </div>
                            <span class="profile-username">
                                <span class="op-7">Hi,</span> <span class="fw-bold">Hizrian</span>
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="assets/img/profile.jpg" alt="image profile"
                                                class="avatar-img rounded"></div>
                                        <div class="u-text">
                                            <h4>Hizrian</h4>
                                            <p class="text-muted">hello@example.com</p><a href="profile.html"
                                                class="btn btn-xs btn-secondary btn-sm">View Profile</a>
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
                                    <a class="dropdown-item" href="#">Logout</a>
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
                <div class="ms-md-auto py-2 py-md-0 float-end">
                    <div class="card mt-2 mb-3">
                        <div class="container">
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
                                                    <label for="thumbnail" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" name="thumbnail" id="thumbnail">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama_layanan" class="form-label">Nama Layanan</label>
                                                    <input type="text" class="form-control" name="nama_layanan" id="nama_layanan">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jenis_layanan" class="form-label">Berat</label>
                                                    <select class="form-control" id="unit" name="unit">
                                                        <option value="" selected disabled>Select Unit</option>
                                                        <option value="1">Kg</option>
                                                        <option value="2">Pcs</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="thumbnail" class="form-label">Tanggal Pemesanan</label>
                                                    <input type="date" class="form-control" name="thumbnail" id="thumbnail">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama_layanan" class="form-label">Tanggal Selesai</label>
                                                    <input type="date" class="form-control" name="nama_layanan" id="nama_layanan">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jenis_layanan" class="form-label">Status Barang</label>
                                                    <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan">
                                                </div>
                                                <div class="form-group">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4 mt-3">
                    <button class="btn btn-outline-primary btn-lg w-100 text-start" style="border-radius: 15px;">
                        <div class="d-flex align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="col col-stats ps-3 ms-sm-0">
                                <div class="numbers">
                                    <!-- <p class="card-category">Orderan Masuk</p> -->
                                    <h4 class="card-title">Orderan Masuk</h4>
                                </div>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-sm-6 col-md-4 mt-3">
                    <button class="btn btn-outline-info btn-lg w-100 text-start" style="border-radius: 15px;">
                        <div class="d-flex align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-user-check"></i>
                                </div>
                            </div>
                            <div class="col col-stats ps-3 ms-sm-0">
                                <div class="numbers">
                                    <!-- <p class="card-category">Layanan</p> -->
                                    <h4 class="card-title">Layanan</h4>
                                </div>
                            </div>
                        </div>
                    </button>
                </div>
                <div class="col-sm-6 col-md-4 mt-3">
                    <button class="btn btn-outline-warning btn-lg w-100 text-start" style="border-radius: 15px;">
                        <div class="d-flex align-items-center">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-warning bubble-shadow-small">
                                    <i class="fas fa-luggage-cart"></i>
                                </div>
                            </div>
                            <div class="col col-stats ps-3 ms-sm-0">
                                <div class="numbers">
                                    <!-- <p class="card-category">Belum Diambil</p> -->
                                    <h4 class="card-title">Belum Diambil</h4>
                                </div>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
            <br>
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
        </div>




        <footer>
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                        <div class="copyright">
                            2024, made with <i class="fa fa-heart heart text-danger"></i> by <a
                                href="http://www.themekita.com">ThemeKita</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    {{-- <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> --}}

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>
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