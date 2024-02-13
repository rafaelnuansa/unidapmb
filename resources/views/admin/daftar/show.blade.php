<!-- resources/views/admin/daftar/show.blade.php -->

@extends('layouts.admin') <!-- Assuming you have an admin layout, adjust this as needed -->

@section('content')
    <div class="row">

        <div class="col-md-12">

            <div class="card card-animate">
                <div class="card-header">
                    <h5 class="card-title">Registration Information</h5>
                </div>
                <div class="card-body">

                    <div class="table-responsive table-card">
                        <table class="table table-bordered">

                            <tbody>
                                <tr>
                                    <td>Nomor Reg</td>
                                    <td>{{ $registration->nomor_registrasi }}</td>
                                </tr>
                                <tr>
                                    <td>Pendaftar</td>
                                    <td>{{ $registration->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Periode</td>
                                    <td>{{ $registration->periode->name }}</td>
                                </tr>
                                <tr>
                                    <td>Jenjang</td>
                                    <td>{{ $registration->jenjang->name }}</td>
                                </tr>
                                <tr>
                                    <td>Jurusan 1</td>
                                    <td>{{ $registration->jurusan1->name }}</td>
                                </tr>

                                <tr>
                                    <td>Jurusan 2</td>
                                    <td>{{ $registration->jurusan2->name }}</td>
                                </tr>
                                <tr>
                                    <td>Jurusan 3</td>
                                    <td>{{ $registration->jurusan3->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>

        </div>

        <div class="col-md-12">

            <div class="card card-animate">
                <div class="card-header">
                    <h5 class="card-title">Biodata</h5>
                </div>
                <div class="card-body">

                    <div class="table-responsive table-card">
                        <table class="table table-bordered">

                            <tbody>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>{{ $registration->user->detail->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td>{{ $registration->user->detail->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat Lahir</td>
                                    <td>{{ $registration->user->detail->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <td>NISN</td>
                                    <td>{{ $registration->user->detail->nisn }}</td>
                                </tr>
                                <tr>
                                    <td>NPWP</td>
                                    <td>{{ $registration->user->detail->npwp }}</td>
                                </tr>

                                <tr>
                                    <td>NIK</td>
                                    <td>{{ $registration->user->detail->nik }}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>{{ $registration->user->detail->agama->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-md-12">

            <div class="card card-animate">
                <div class="card-header">
                    <h5 class="card-title">Alamat</h5>
                </div>
                <div class="card-body">

                    <div class="table-responsive table-card">
                        <table class="table table-bordered">

                            <tbody>
                                <tr>
                                    <td>RT</td>
                                    <td>{{ $registration->user->alamat->jalan }}</td>
                                </tr>
                                <tr>
                                    <td>RW</td>
                                    <td>{{ $registration->user->alamat->rt }}</td>
                                </tr>
                                <tr>
                                    <td>Dusun</td>
                                    <td>{{ $registration->user->alamat->dusun }}</td>
                                </tr>
                                <tr>
                                    <td>Desa</td>
                                    <td>{{ $registration->user->alamat->desa }}</td>
                                </tr>

                                <tr>
                                    <td>NIK</td>
                                    <td>{{ $registration->user->detail->nik }}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>{{ $registration->user->detail->agama->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="mb-3">
                <a href="{{ route('admin.daftar.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
