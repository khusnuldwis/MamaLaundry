<div class="main-header">
    <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">

            <a href="index.html" class="logo">
                <img src="{{asset('assets/img/landingPage/logo-mamalaundry.png')}}" alt="navbar brand" class="navbar-brand"
                    height="20">
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
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">

        <div class="container-fluid">


            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                

                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <!-- Ganti gambar dengan gambar yang terkait dengan login -->
                            <img src="{{ Storage::url(Auth::user()->profil) }}" alt="Profil" class="img-fluid" style="width:40px; height: 40px; border-radius: 50%; object-fit: cover;">
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
                                        <!-- Ganti ikon dengan gambar profil -->
                                        @if (Auth::user()->profil)
                                        <img src="{{ Storage::url(Auth::user()->profil) }}" alt="Profil" class="img-fluid rounded-circle" width="150">
                                        @else
                                        <img src="{{ asset('storage/default-profile.png') }}" alt="Default Profil" class="img-fluid rounded-circle" width="150">
                                        @endif
                                    </div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
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


            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>