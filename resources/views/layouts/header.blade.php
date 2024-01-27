<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <div
                                class="rounded-circle header-profile-user d-flex justify-content-center align-items-center bg-primary text-white">
                                <span>{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </div>
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                    {{ auth()->user()->name }}
                                </span>

                                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">
                                    @if (Auth::check() && Auth::user()->is_admin)
                                        Admin
                                    @else
                                        Users
                                    @endif
                                </span>


                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">
                            {{ auth()->user()->name }}
                        </h6>
                        <a class="dropdown-item" href="{{ route('profile.index') }}"><i
                                class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i>
                            <span class="align-middle">Profile</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                            <span class="align-middle" data-key="t-logout">Logout</span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
