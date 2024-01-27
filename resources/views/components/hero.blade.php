<section id="hero" class="hero">
    <div class="container position-relative">
        <div class="row gy-5" data-aos="fade-in">
            <div class="col-lg-8 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                <h2>Penerimaan <span>Mahasiswa Baru</span></h2>
                <p>Daftar kuliah makin mudah dengan Pendaftaran Online yang bisa di akses dimana saja kapan saja.</p>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="{{ route('register')}}" class="btn btn-get-started">Daftar Sekarang</a>
                    <a href="{{ route('login') }}" class="btn btn-get-started" style="margin-left: 5px">Login</a>
                </div>
            </div>
            <div class="col-lg-4 order-1 order-lg-2">
                <img src="{{ asset('themes/heroslide.png') }}" class="img-fluid" alt="" data-aos="zoom-out"
                    data-aos-delay="100">
            </div>
        </div>
    </div>

    <div class="icon-boxes position-relative">
        <div class="container position-relative">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 g-3 mt-5">

                <div class="col aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box" style="background: #F8F8F8!important;">
                        <div class="icon"><i class="bi bi-person-plus-fill" style="color: #86BC42!important;"></i>
                        </div>
                        <h4 class="title"><a href="" class="stretched-link"
                                style="color: #106309!important;">Sarjana</a></h4>
                    </div>
                </div><!--End Icon Box -->

                <div class="col aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box" style="background: #86BC42!important;">
                        <div class="icon"><i class="bi bi-mortarboard-fill text-white"></i></div>
                        <h4 class="title"><a href="" class="stretched-link text-white">Pascasarjana</a></h4>
                    </div>
                </div><!--End Icon Box -->

                <div class="col aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box" style="background: #F8F8F8!important;">
                        <div class="icon"><i class="bi bi-laptop-fill" style="color: #86BC42!important;"></i></div>
                        <h4 class="title"><a href="" class="stretched-link"
                                style="color: #106309!important;">Sekolah Vokasi</a></h4>

                    </div>
                </div><!--End Icon Box -->

            </div>
        </div>
    </div>

    </div>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your login form goes here -->
                    <form>
                        <!-- Add your login form fields here -->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
