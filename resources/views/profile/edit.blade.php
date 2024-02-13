@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('profile.update') }}">
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img"><img src="https://dev-cms.unida.ac.id/assets/img/slide.png"
                class="profile-wid-img" alt=""></div>
    </div>

        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card mt-xxl-n5 card-animate">
                    <div class="card-header">
                        <h2 class="card-title">Profile</h2>
                    </div>
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $user->name) }}" placeholder="Enter Full Name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="phonenumberInput" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="phonenumberInput" name="phone"
                                        value="{{ old('phone', $user->phone) }}" placeholder="Masukkan Nomor Telpon">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="emailInput" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="emailInput" name="email"
                                        placeholder="Masukkan alamat email" disabled value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                        placeholder="Tempat Lahir"
                                        value="{{ old('tempat_lahir', optional($user->detail)->tempat_lahir) }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                        placeholder="tanggal_lahir"
                                        value="{{ old('tanggal_lahir', optional($user->detail)->tanggal_lahir) }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="" disabled hidden>Pilih Jenis Kelamin</option>
                                        <option value="L" @if (old('jenis_kelamin', optional($user->detail)->jenis_kelamin) === 'L') selected @endif>Laki-laki
                                        </option>
                                        <option value="P" @if (old('jenis_kelamin', optional($user->detail)->jenis_kelamin) === 'P') selected @endif>Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>






                        </div>
                    </div>
                </div>



                <div class="card card-animate">
                    <div class="card-body">
                     <div class="row">


                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn"
                                    placeholder="NISN" value="{{ old('nisn', optional($user->detail)->nisn) }}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik"
                                    placeholder="NIK" value="{{ old('nik', optional($user->detail)->nik) }}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="npwp"
                                    placeholder="NPWP" value="{{ old('npwp', optional($user->detail)->npwp) }}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Agama {{ $user->detail->agama_id }}</label>
                                <select class="form-select" id="agama" name="agama_id">
                                    <option value="" disabled selected>Select Agama</option>
                                    @foreach($agamas as $agama)
                                        <option value="{{ $agama->id }}" @if(old('agama', optional($user->detail)->agama_id) == $agama->id) selected @endif>{{ $agama->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap Ibu Kandung</label>
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                                    placeholder="Nama Lengkap Ibu Kandung"
                                    value="{{ old('nisn', optional($user->detail)->nama_ibu) }}">
                            </div>
                        </div>
                     </div>
                    </div>
                </div>
                <div class="card card-animate">
                    <div class="card-body">
                     <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Jalan</label>
                                <input type="text" class="form-control" id="jalan" name="jalan"
                                    placeholder="Enter Jalan" value="{{ old('jalan', $user->alamat->jalan ?? '') }}">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">RT</label>
                                <input type="text" class="form-control" id="rt" name="rt"
                                    placeholder="Enter RT" value="{{ old('rt', $user->alamat->rt ?? '') }}">
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label">RW</label>
                                <input type="text" class="form-control" id="rw" name="rw"
                                    placeholder="Enter RW" value="{{ old('rw', $user->alamat->rw ?? '') }}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Dusun</label>
                                <input type="text" class="form-control" id="dusun" name="dusun"
                                    placeholder="Enter Dusun" value="{{ old('dusun', $user->alamat->dusun ?? '') }}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Desa</label>
                                <input type="text" class="form-control" id="desa" name="desa"
                                    placeholder="Enter Desa" value="{{ old('desa', $user->alamat->desa ?? '') }}">
                            </div>
                        </div>
                     </div>
                    </div>
                </div>


                <div class="col-lg-12 mb-4">
                    <div class="justify-content-end">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                        <a class="btn btn-soft-success" href="{{ route('profile.index') }}">Cancel</a>
                    </div>
                </div>

            </div>


    </div>

</form>
@endsection
