@extends('layouts.app')

@section('content')
<form action="{{ route('daftar.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Form Pendaftaran</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 col-12 mb-2"><a class="btn btn-md btn-dark border-0 shadow w-100" type="button"
                        href="{{ route('daftar.index') }}"><i class="fa fa-arrow-left me-2"></i>Kembali</a></div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="alert alert-success">
                        <h5 class="alert-heading">{{ $periodeAktif->name }}</h5>
                        <ul class="list-unstyled mb-0">
                            <li><strong>Tanggal Mulai:</strong> {{ $periodeAktif->start_date }}</li>
                            <li><strong>Tanggal Berakhir:</strong> {{ $periodeAktif->end_date }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Form Pendaftaran</h4>

                        <div class="mb-3">
                            <label for="jenjang_id" class="form-label">Pilih Jenjang</label>
                            <select id="jenjang_id" name="jenjang_id" class="form-select">
                                <option value="" disabled selected>Pilih Jenjang/Program</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jurusan_1_id" class="form-label">Pilihan Jurusan 1</label>
                            <select id="jurusan_1_id" name="jurusan_1_id" data-jurusans="true" class="form-select select2">
                                <!-- Pilihan Jurusan 1 -->
                                <option value="">Pilih Jurusan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jurusan_2_id" class="form-label">Pilihan Jurusan 2</label>
                            <select id="jurusan_2_id" name="jurusan_2_id" class="form-select">
                                <option value="">Pilih Jurusan</option>
                                <!-- Pilihan Jurusan 2 -->
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="jurusan_3_id" class="form-label">Pilihan Jurusan 3</label>
                            <select id="jurusan_3_id" name="jurusan_3_id" class="form-select">
                                <option value="">Pilih Jurusan</option>
                            </select>
                        </div>


                        <!-- Tambahkan ini di dalam form -->
                        <div class="mb-3">
                            <label for="kelas_id" class="form-label">Kelas</label>
                            <select id="kelas_id" name="kelas_id" class="form-select">
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $kelasItem)
                                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="beasiswa_id" class="form-label">Beasiswa</label>
                            <select id="beasiswa_id" name="beasiswa_id" class="form-select">
                                <option value="">Pilih Beasiswa</option>
                                @foreach ($beasiswa as $beasiswaItem)
                                    <option value="{{ $beasiswaItem->id }}">{{ $beasiswaItem->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3"><button type="submit" class="btn btn-primary">Submit</button></div>

                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
    <script>
        // Script untuk mengisi opsi jenjang dan jurusan
        $(document).ready(function() {
            var jenjangSelect = $('#jenjang_id');
            // Set the default option when the form is first loaded
            jenjangSelect.append('<option value="" disabled selected>Pilih Jenjang/Program</option>');

            // Ambil data jenjang dari controller menggunakan AJAX
            $.ajax({
                url: "{{ route('daftar.getJenjang') }}",
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Kosongkan opsi jenjang
                    jenjangSelect.empty();

                    // Tambahkan opsi jenjang ke dalam dropdown
                    if (data.data.length > 0) {
                        $.each(data.data, function(key, value) {
                            jenjangSelect.append('<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });

                        // Event handler saat jenjang diubah
                        jenjangSelect.change(function() {
                            var selectedJenjangId = $(this).val();
                            var jurusanSelect1 = $('#jurusan_1_id');
                            var jurusanSelect2 = $('#jurusan_2_id');
                            var jurusanSelect3 = $('#jurusan_3_id');

                            // Kosongkan opsi jurusan
                            jurusanSelect1.empty();
                            jurusanSelect2.empty();
                            jurusanSelect3.empty();

                            // Ambil data jurusan berdasarkan jenjang yang dipilih
                            $.ajax({
                                url: "{{ route('daftar.getJurusanByJenjang') }}",
                                type: 'GET',
                                data: {
                                    jenjang_id: selectedJenjangId
                                },
                                dataType: 'json',
                                success: function(jurusanData) {
                                    // Tambahkan opsi jurusan ke dalam dropdown
                                    if (jurusanData.data.length > 0) {
                                        $.each(jurusanData.data, function(key,
                                            value) {
                                            jurusanSelect1.append(
                                                '<option value="' +
                                                value.id + '">' + value
                                                .name + '</option>');
                                            jurusanSelect2.append(
                                                '<option value="' +
                                                value.id + '">' + value
                                                .name + '</option>');
                                            jurusanSelect3.append(
                                                '<option value="' +
                                                value.id + '">' + value
                                                .name + '</option>');
                                        });
                                    } else {
                                        // Handle jika tidak ada jurusan
                                        jurusanSelect1.append(
                                            '<option value="" disabled selected>Data tidak tersedia</option>'
                                        );
                                        jurusanSelect2.append(
                                            '<option value="" disabled selected>Data tidak tersedia</option>'
                                        );
                                        jurusanSelect3.append(
                                            '<option value="" disabled selected>Data tidak tersedia</option>'
                                        );
                                    }
                                }
                            });
                        });
                    } else {
                        // Handle jika tidak ada jenjang
                        jenjangSelect.append(
                            '<option value="" disabled selected>Data tidak tersedia</option>');
                    }
                }
            }).done(function() {
                // Trigger change event after options are loaded to ensure the default option is selected
                jenjangSelect.change();
            });
        });
    </script>
@endpush
