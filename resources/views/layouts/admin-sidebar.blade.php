<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <h2 class="text-primary fw-bold  mt-3"> {{ __('PMB') }}</h2>
            </span>
            <span class="logo-lg">
                <h2 class="text-primary fw-bold  mt-3"> {{ __('PMB ONLINE') }}</h2>
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <h4 class="text-white fw-bold mt-3"> {{ __('PMB') }}</h4>
            </span>
            <span class="logo-lg">
                <h4 class="text-white fw-bold mt-3"> {{ __('PMB ONLINE') }}</h4>
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title">
                    <span data-key="t-menu">Menu</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="bx bxs-dashboard"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('admin.daftar.*') ? 'active' : '' }}" href="{{ route('daftar.index') }}">
                        <i class="bx bxs-dashboard"></i>
                        <span data-key="t-dashboard">Data Registrasi</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('admin.kelas.*') ? 'active' : '' }}" href="{{ route('admin.kelas.index') }}">
                        <i class="bx bxs-dashboard"></i>
                        <span data-key="t-dashboard">Kelas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('admin.fakultas.*') ? 'active' : '' }}" href="{{ route('admin.fakultas.index') }}">
                        <i class="bx bxs-dashboard"></i>
                        <span data-key="t-dashboard">Fakultas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ Route::is('admin.jurusans.*') ? 'active' : '' }}" href="{{ route('admin.jurusans.index') }}">
                        <i class="bx bxs-dashboard"></i>
                        <span data-key="t-dashboard">Jurusan</span>
                    </a>
                </li>


            </ul>
        </div>

        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
