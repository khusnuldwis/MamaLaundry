@php
    $status = $status ?? null; // Nilai default jika tidak didefinisikan
@endphp

<div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">

                    <a href="index.html" class="logo">
                    <img src="{{asset('img/landingPage/logo-mamalaundry.png')}}" alt="navbar brand" class="navbar-brand"
                    height="67">
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>

                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item active">
                            <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="dashboard">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/home">
                                            <span class="sub-item">Home</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#base">
                                <i class="fas fa-layer-group"></i>
                                <p>Pesanan Masuk</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="base">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ url('/order?status=masuk') }}" class="nav-link {{ $status == 'masuk' ? 'active' : '' }}">
                                            <span class="sub-item">Order Masuk</span>
                                        </a>
                                    </li>
                                    <li>
                                    
                                        <a href="{{ url('/order?status=proses') }}" class="nav-link {{ $status == 'proses' ? 'active' : '' }}">
                                            <span class="sub-item">Order Proses</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/order?status=selesai') }}" class="nav-link {{ $status == 'selesai' ? 'active' : '' }}">
                                            <span class="sub-item">Order Selesai</span>
                                        </a>
                                    </li>
                                    {{-- <li>
                                        <a href="components/buttons.html">
                                            <span class="sub-item">Buttons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/gridsystem.html">
                                            <span class="sub-item">Grid System</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/panels.html">
                                            <span class="sub-item">Panels</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/notifications.html">
                                            <span class="sub-item">Notifications</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/sweetalert.html">
                                            <span class="sub-item">Sweet Alert</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/font-awesome-icons.html">
                                            <span class="sub-item">Font Awesome Icons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/simple-line-icons.html">
                                            <span class="sub-item">Simple Line Icons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components/typography.html">
                                            <span class="sub-item">Typography</span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#pemasukan">
                                <i class="fas fa-th-list"></i>
                                <p>Pemasukan</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="pemasukan">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ route('order.index', ['status' => 'diambil', 'range' => 'hari']) }}">
                                            <span class="sub-item">Order Per Hari</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('order.index', ['status' => 'diambil', 'range' => 'minggu']) }}">
                                            <span class="sub-item">Order Per Minggu</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#layanan">
                                <i class="fas fa-th-list"></i>
                                <p>Layanan</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="layanan">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="/layanan">
                                            <span class="sub-item">Data Layanan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/durasi">
                                            <span class="sub-item">Durasi Layanan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/kategori">
                                            <span class="sub-item">Kategori Layanan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/metode">
                                            <span class="sub-item">Metode Layanan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                     
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#tables">
                                <i class="fas fa-table"></i>
                                <p>Pesanan Belum Diambil</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="tables">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{ url('/order?status=belum_diambil') }}" class="nav-link {{ $status == 'selesai' ? 'active' : '' }}">
                                            <span class="sub-item">Pesanan Belum Diambil</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                       
                        {{-- <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#charts">
                                <i class="far fa-chart-bar"></i>
                                <p>Charts</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="charts">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="charts/charts.html">
                                            <span class="sub-item">Chart Js</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="charts/sparkline.html">
                                            <span class="sub-item">Sparkline</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="widgets.html">
                                <i class="fas fa-desktop"></i>
                                <p>Widgets</p>
                                <span class="badge badge-success">4</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../../documentation/index.html">
                                <i class="fas fa-file"></i>
                                <p>Documentation</p>
                                <span class="badge badge-secondary">1</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="collapse" href="#submenu">
                                <i class="fas fa-bars"></i>
                                <p>Menu Levels</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="submenu">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a data-bs-toggle="collapse" href="#subnav1">
                                            <span class="sub-item">Level 1</span>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="subnav1">
                                            <ul class="nav nav-collapse subnav">
                                                <li>
                                                    <a href="#">
                                                        <span class="sub-item">Level 2</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="sub-item">Level 2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a data-bs-toggle="collapse" href="#subnav2">
                                            <span class="sub-item">Level 1</span>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="collapse" id="subnav2">
                                            <ul class="nav nav-collapse subnav">
                                                <li>
                                                    <a href="#">
                                                        <span class="sub-item">Level 2</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="sub-item">Level 1</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>