<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>MamaLaundry</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{asset('assets/img/kaiadmin/favicon.ico')}}" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

    <!-- Fonts and icons -->
    <script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
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
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/kaiadmin.min.css')}}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('layout.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            @include('layout.nav')



            <div class="container">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div>
                            <h3 class="fw-bold">Mama Laundry</h3>
                            <!-- <h6 class="op-7 mb-2">MamaLaundry</h6> -->
                        </div>
                        <!-- {{-- <div class="ms-md-auto py-2 py-md-0">
                            <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                            <a href="#" class="btn btn-primary btn-round">Add Customer</a>
                        </div> --}} -->
                    </div>
                    <!-- <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Visitors</p>
                                                <h4 class="card-title">1,294</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                                <i class="fas fa-user-check"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Subscribers</p>
                                                <h4 class="card-title">1303</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                                <i class="fas fa-luggage-cart"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Sales</p>
                                                <h4 class="card-title">$ 1,345</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-icon">
                                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                                <i class="far fa-check-circle"></i>
                                            </div>
                                        </div>
                                        <div class="col col-stats ms-3 ms-sm-0">
                                            <div class="numbers">
                                                <p class="card-category">Order</p>
                                                <h4 class="card-title">576</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 mt-3">
                            <a href="/orders" class="btn btn-outline-primary btn-lg w-100 text-start" style="border-radius: 15px;">
                                <div class="d-flex align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                                            <i class="fas fa-users"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ps-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-title fs-6 fw-bold">Orderan Masuk</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-3 col-md-3 mt-3">
                            <a href="/layanan" class="btn btn-outline-info btn-lg w-100 text-start" style="border-radius: 15px;">
                                <div class="d-flex align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-info bubble-shadow-small">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ps-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-title fs-6 fw-bold">Layanan</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-3 col-md-3 mt-3">
                            <a href="/kategori" class="btn btn-outline-info btn-lg w-100 text-start" style="border-radius: 15px;">
                                <div class="d-flex align-items-center">
                                    <div class="col-icon">
                                        <div class="icon-big text-center icon-info bubble-shadow-small">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                    </div>
                                    <div class="col col-stats ps-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-title fs-6 fw-bold">Kategori</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-sm-3 col-md-3 mt-3">
                            <a href="{{ route('orderMasuk.belumDiambil') }}" class="btn btn-outline-info btn-lg w-100 text-start" style="border-radius: 15px;">
                                <div class="d-flex align-items-center">
                                    <div class="icon-big text-center icon-warning bubble-shadow-small">
                                        <i class="fas fa-luggage-cart"></i>
                                    </div>
                                    <div class="col col-stats ps-3 ms-sm-0">
                                        <div class="numbers">
                                            <p class="card-title fs-6 fw-bold mb-0">Belum Diambil</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div> -->
                    <!-- <br> -->

                    @yield('content')

                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <!-- Bootstrap JS dan dependensi (Popper.js) -->
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>