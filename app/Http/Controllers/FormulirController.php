<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\User;
use App\Models\UserAlamat;
use App\Models\UserStatusKerja;
use Illuminate\Http\Request;

class FormulirController extends Controller
{


    public function index(Request $request, $encryptRegistNumber)
    {
        $user = $request->user();
        $detail = $user->detail;

        return view('formulir.biodata', [
            'biodata' => $detail,
            'encryptRegistNumber' => $encryptRegistNumber,
        ]);
    }

    public function biodata_store(Request $request, $encryptRegistNumber)
    {
        try {
            // Validasi input
            $request->validate([
                'jenis_kelamin' => 'required',
                'tanggal_lahir' => 'required|date',
                'tempat_lahir' => 'required|string',
            ]);

            // Cari user berdasarkan nomor pendaftaran
            $user = $request->user();

            $user->detail()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'tanggal_lahir' => $request->tanggal_lahir,
                    'tempat_lahir' => $request->tempat_lahir,
                ]
            );

            return redirect()->route('formulir.alamat', $encryptRegistNumber)->with('success', 'Data biodata berhasil disimpan.');
        } catch (QueryException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function alamat(Request $request, $encryptRegistNumber)
    {
        $user = $request->user();
        $alamat = $user->alamat();
        return view('formulir.alamat', [
            'alamat' => $alamat,
            'encryptRegistNumber' => $encryptRegistNumber,
        ]);


    }

    public function alamat_store(Request $request, $encryptRegistNumber)
    {
        // Validasi input
        $request->validate([
            'jalan' => 'required|string',
            'rt' => 'nullable|string',
            'rw' => 'nullable|string',
            'dusun' => 'nullable|string',
            'desa' => 'nullable|string',
        ]);

        // Ambil ID pengguna yang sedang login
        $userId = $request->user()->id;

        // Simpan atau perbarui data alamat pengguna
        UserAlamat::updateOrCreate(
            ['user_id' => $userId],
            [
                'jalan' => $request->jalan,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'dusun' => $request->dusun,
                'desa' => $request->desa,
            ]
        );

        return redirect()->route('formulir.kerja', $encryptRegistNumber)->with('success', 'Data alamat berhasil disimpan.');
    }


    public function kerja(Request $request, $encryptRegistNumber)
    {
        // Ambil data pekerjaan dari user yang sedang login
        $user = $request->user();
        $kerja = $user->kerja;

        return view('formulir.kerja', [
            'kerja' => $kerja,
            'encryptRegistNumber' => $encryptRegistNumber,
        ]);
    }


    public function kerja_store(Request $request, $encryptRegistNumber)
    {
        $request->validate([
            'status_kerja' => 'required|boolean',
            'nama_instansi' => 'nullable|string',
            'alamat_kerja' => 'nullable|string',
            'kota_kerja' => 'nullable|string',
        ]);

        $userId = $request->user()->id;

        UserStatusKerja::updateOrCreate(
            ['user_id' => $userId],
            [
                'status_kerja' => $request->status_kerja,
                'nama_instansi' => $request->nama_instansi,
                'alamat_kerja' => $request->alamat_kerja,
                'kota_kerja' => $request->kota_kerja,
            ]
        );

        return redirect()->route('formulir.ayah', $encryptRegistNumber)->with('success', 'Data pekerjaan berhasil disimpan.');
    }

    public function ayah($encryptRegistNumber)
    {
        $ayah = request()->user()->ayah;

        return view('formulir.ayah', compact('encryptRegistNumber', 'ayah'));
    }

    public function ayah_store(Request $request, $encryptRegistNumber)
    {
        $request->validate([
            'nama' => 'required|string',
            'nik' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'jenjang_pendidikan_id' => 'nullable|integer',
            'pekerjaan_id' => 'nullable|integer',
            'penghasilan_id' => 'nullable|integer',
        ]);

        $userId = $request->user()->id;
        UserDataAyah::updateOrCreate(
            ['user_id' => $userId],
            [
                'nama' => $request->nama,
                'nik' => $request->nik,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenjang_pendidikan_id' => $request->jenjang_pendidikan_id,
                'pekerjaan_id' => $request->pekerjaan_id,
                'penghasilan_id' => $request->penghasilan_id,
            ]
        );

        return redirect()->route('formulir.ibu', $encryptRegistNumber)->with('success', 'Data ayah berhasil disimpan.');
    }
    public function ibu($encryptRegistNumber)
    {
        $ibu = request()->user()->ibu;
        return view('formulir.ibu', compact('encryptRegistNumber', 'ibu'));
    }

    public function ibu_store(Request $request, $encryptRegistNumber)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string',
            'nik' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'jenjang_pendidikan_id' => 'nullable|integer',
            'pekerjaan_id' => 'nullable|integer',
            'penghasilan_id' => 'nullable|integer',
            // tambahkan validasi untuk field lainnya sesuai kebutuhan
        ]);

        // Ambil ID pengguna yang sedang login
        $userId = $request->user()->id;

        // Simpan atau perbarui data ibu pengguna
        UserDataIbu::updateOrCreate(
            ['user_id' => $userId],
            [
                'nama' => $request->nama,
                'nik' => $request->nik,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenjang_pendidikan_id' => $request->jenjang_pendidikan_id,
                'pekerjaan_id' => $request->pekerjaan_id,
                'penghasilan_id' => $request->penghasilan_id,
            ]
        );

        // Redirect ke tahapan formulir berikutnya atau tampilkan pesan sukses
        return redirect()->route('formulir.wali', $encryptRegistNumber)->with('success', 'Data ibu berhasil disimpan.');
    }

    public function wali($encryptRegistNumber)
    {
        $wali = request()->user()->wali;
        return view('formulir.wali', compact('encryptRegistNumber', 'wali'));
    }



    public function wali_store(Request $request, $encryptRegistNumber)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string',
            'tanggal_lahir' => 'nullable|date',
            'jenjang_pendidikan_id' => 'nullable|integer',
            'pekerjaan_id' => 'nullable|integer',
            'penghasilan_id' => 'nullable|integer',
            // tambahkan validasi untuk field lainnya sesuai kebutuhan
        ]);

        // Ambil ID pengguna yang sedang login
        $userId = $request->user()->id;

        // Simpan atau perbarui data wali pengguna
        UserDataWali::updateOrCreate(
            ['user_id' => $userId],
            [
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenjang_pendidikan_id' => $request->jenjang_pendidikan_id,
                'pekerjaan_id' => $request->pekerjaan_id,
                'penghasilan_id' => $request->penghasilan_id,
            ]
        );

        // Redirect ke tahapan formulir berikutnya atau tampilkan pesan sukses
        return redirect()->route('formulir.lampiran', $encryptRegistNumber)->with('success', 'Data wali berhasil disimpan.');
    }
    public function lampiran($encryptRegistNumber)
    {
        $lampiran = request()->user()->lampiran;
        return view('formulir.lampiran', compact('encryptRegistNumber', 'lampiran'));
    }
    public function lampiran_store(Request $request, $encryptRegistNumber)
    {
        // Validasi input
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ktp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'ijazah' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // tambahkan validasi untuk field lainnya sesuai kebutuhan
        ]);

        // Ambil ID pengguna yang sedang login
        $userId = $request->user()->id;

        // Simpan data lampiran pengguna
        $lampiran = new UserLampiran();
        $lampiran->user_id = $userId;

        // Mengunggah foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('lampiran', 'public');
            $lampiran->foto = $fotoPath;
        }

        // Mengunggah scan KTP jika ada
        if ($request->hasFile('ktp')) {
            $ktpPath = $request->file('ktp')->store('lampiran', 'public');
            $lampiran->ktp = $ktpPath;
        }

        // Mengunggah scan ijazah jika ada
        if ($request->hasFile('ijazah')) {
            $ijazahPath = $request->file('ijazah')->store('lampiran', 'public');
            $lampiran->ijazah = $ijazahPath;
        }

        $lampiran->save();

        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('daftar.index')->with('success', 'Data lampiran berhasil disimpan.');
    }
}
