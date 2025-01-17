@php
    $status = $status ?? null; // Nilai default jika tidak didefinisikan
@endphp

<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20" />
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
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <!-- Home Menu -->
                <li class="nav-item">
                    <a href="/home">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>

                    <!-- Transaksi Menu -->
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#base">
                            <i class="fas fa-layer-group"></i>
                            <p>Transaksi</p>
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
                                    <a href="{{ url('/order?status=selesai') }}" class="nav-link {{ $status == 'selesai' ? 'active' : '' }}">
                                        <span class="sub-item">Riwayat Transaksi</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Pesanan Belum Diambil -->
                    <li class="nav-item">
                        <a href="{{ url('/order?status=belum_diambil') }}">
                            <i class="fas fa-pen-square"></i>
                            <p>Pesanan Belum Diambil</p>
                        </a>
                    </li>
                    @if(auth()->user()->role->name === 'admin')

                    <!-- Laporan Menu -->
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#pemasukan">
                            <i class="fas fa-file"></i>
                            <p>Laporan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="pemasukan">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('order.index', ['status' => 'selesai', 'range' => 'hari']) }}">
                                        <span class="sub-item">Transaksi Per Hari</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('order.index', ['status' => 'selesai', 'range' => 'minggu']) }}">
                                        <span class="sub-item">Transaksi Per Minggu</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Layanan Menu -->
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

                    <!-- Karyawan Menu -->
                    <li class="nav-item">
                        <a href="/user">
                            <i class="fas fa-users"></i>
                            <p>Karyawan</p>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
