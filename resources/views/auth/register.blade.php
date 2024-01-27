<!doctype html>
<html lang="en" data-layout="horizontal" data-topbar="dark" data-sidebar-size="lg" data-sidebar="light"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sistem Penunjang Keputusan" name="description" />
    <meta content="Andrian Fauzi" name="author" /><!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />



</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="#" class="d-inline-block auth-logo">
                                    <h2 class="fw-bold text-white"> {{ __('Registrasi Akun') }}</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="p-2 mt-4">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <!-- Name -->
                                        <div class="mb-3">
                                            <label for="name" class="form-label">{{ __('Name') }}</label>
                                            <input id="name" class="form-control" type="text" name="name"
                                                value="{{ old('name') }}" required autofocus autocomplete="name">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Email Address -->
                                        <div class="mb-3">
                                            <label for="email" class="form-label">{{ __('Email') }}</label>
                                            <input id="email" class="form-control" type="email" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Email Address -->
                                        <div class="mb-3">
                                            <label for="phone"
                                                class="form-label">{{ __('Nomor Handphone') }}</label>
                                            <input id="phone" class="form-control" type="number" name="phone"
                                                value="{{ old('phone') }}" required autocomplete="phone">
                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Password -->
                                        <div class="mb-3">
                                            <label for="password" class="form-label">{{ __('Password') }}</label>
                                            <input id="password" class="form-control" type="password" name="password"
                                                required autocomplete="new-password">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mb-3">
                                            <label for="password_confirmation"
                                                class="form-label">{{ __('Confirm Password') }}</label>
                                            <input id="password_confirmation" class="form-control" type="password"
                                                name="password_confirmation" required autocomplete="new-password">
                                            @error('password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="d-flex justify-content-end align-items-center mt-4">

                                            <button type="submit"
                                                class="btn btn-primary">{{ __('Register') }}</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Sudah punya akun ? <a href="{{ route('login') }}"
                                    class="fw-semibold text-primary text-decoration-underline"> Login disini </a>
                            </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                {{ date('Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->
    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- particles js -->
    <script src="{{ asset('assets/libs/particles.js/particles.js') }}"></script>
    <!-- particles app js -->
    <script src="{{ asset('assets/js/pages/particles.app.js') }}"></script>
    <!-- password-addon init -->
    <script src="{{ asset('assets/js/pages/password-addon.init.js') }}"></script>

</body>

</html>
