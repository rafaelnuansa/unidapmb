<!-- Hero -->
<div class="relative bg-gradient-to-bl from-blue-100 via-transparent dark:from-blue-950 dark:via-transparent">
    <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 ">
        <!-- Grid -->
        <div class="grid lg:grid-cols-7 lg:gap-x-8 xl:gap-x-12 lg:items-center">
            <!-- Image -->
            <div class="lg:col-span-3 mt-10 lg:mt-0 md:order-first mb-3">
                <img class="w-full rounded-xl" src="{{ asset('heroslide.png') }}" alt="Universitas Djuanda">
            </div>
            <!-- End Image -->

            <!-- Content -->
            <div class="lg:col-span-4">
                <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl md:text-5xl lg:text-6xl dark:text-white">Penerimaan Mahasiswa Baru</h1>
                <p class="mt-3 text-lg text-gray-800 dark:text-gray-400">Selamat datang di proses seleksi penerimaan mahasiswa baru Universitas Djuanda, tempat awal perjalanan Anda menuju masa depan yang gemilang!</p>

                <div class="mt-5 lg:mt-8 flex flex-col items-center gap-2 sm:flex-row sm:gap-3">
                    <a class="w-full sm:w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ route('register')}}">
                        Daftar Sekarang!
                    </a>
                </div>
            </div>
            <!-- End Content -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Max Width Container -->
</div>
<!-- End Hero -->
