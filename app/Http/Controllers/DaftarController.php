<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Jenjang;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\Pendaftaran; // Make sure to import the Pendaftaran model
use App\Traits\CompletenessTrait;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class DaftarController extends Controller
{

    Use CompletenessTrait;

    public function index(Request $request)
    {
        $query = Pendaftaran::orderBy('created_at', 'desc');



        $user = $request->user();
        $completeness = $this->calculateCompleteness($user->detail, $user->alamat );

        // If completeness is less than 80%, redirect to dashboard with an error message
        if ($completeness < 80) {
            return redirect()->route('dashboard')->with('error', 'Harap lengkapi data profile sebelum melakukan pendaftaran.');
        }

        // Filter berdasarkan nomor registrasi jika parameter 'search' diberikan
        if ($request->filled('search')) {
            $query->where('nomor_registrasi', 'like', '%' . $request->input('search') . '%');
        }

        // Filter berdasarkan rentang tanggal jika parameter 'start_date' dan 'end_date' diberikan
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            $query->whereBetween('created_at', [$start_date, $end_date]);
        }


        $registrations = $query->paginate(10);
        return view('daftar.index', compact('registrations'));
    }


    public function form(Request $request)
    {

        $currentDate = Carbon::now();
        $periodeAktif = Periode::whereDate('start_date', '<=', $currentDate)
            ->whereDate('end_date', '>=', $currentDate)
            ->first();

        if (!$periodeAktif) {
            return redirect()->route('dashboard')->with('error', 'Tidak ada periode aktif saat ini.');
        }

        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        $beasiswa = Beasiswa::all();

        $user = $request->user();
        $completeness = $this->calculateCompleteness($user->detail, $user->alamat );

        $existingRegistration = Pendaftaran::where('user_id', $user->id)
        ->where('status', 'pending')
        ->first();

        if ($completeness < 80) {
            return redirect()->route('dashboard')->with('error', 'Harap lengkapi data profile sebelum melakukan pendaftaran.');
        }
        if ($existingRegistration) {
            return redirect()->route('daftar.index')->with('warning', 'Data Registrasi anda masih dalam peninjauan.');
        }

        return view('daftar.form', compact('jurusan', 'kelas', 'beasiswa', 'periodeAktif'));
    }


    public function getJenjang()
    {
        $jenjang = Jenjang::with('jurusans')->get();

        return response()->json([
            'data' => $jenjang,
        ]);
    }

    public function getJurusanByJenjang(Request $request)
    {
        $jenjangId = $request->input('jenjang_id');
        $jurusan = Jurusan::where('jenjang_id', $jenjangId)->get();

        return response()->json([
            'data' => $jurusan,
        ]);
    }

    public function store(Request $request)
    {
        try {
            // Validasi data yang diterima dari formulir
            $request->validate([
                'jenjang_id' => 'required',
                'jurusan_1_id' => 'required',
                'jurusan_2_id' => 'required',
                'jurusan_3_id' => 'required',
                'kelas_id' => 'required',
                'beasiswa_id' => 'nullable',
            ], );

            // Ambil data pendaftaran dari formulir
            $data = $request->only([
                'jenjang_id',
                'jurusan_1_id',
                'jurusan_2_id',
                'jurusan_3_id',
                'kelas_id',
                'beasiswa_id',
            ]);

            // Tambahkan data tambahan ke array
            $data['user_id'] = auth()->user()->id; // ID pengguna yang sedang login
            $data['nomor_registrasi'] = 'REG-' . time(); // Nomor registrasi unik berdasarkan timestamp
            $currentDate = Carbon::now();
            // Ambil periode aktif
            $periodeAktif = Periode::whereDate('start_date', '<=', $currentDate)
            ->whereDate('end_date', '>=', $currentDate)
            ->first();

            if (!$periodeAktif) {
                // Jika periode aktif tidak ditemukan, Anda dapat mengambil tindakan tertentu
                return redirect()->back()->with('error', 'Periode aktif tidak ditemukan.');
            }

            // Sesuaikan data periode_id dengan periode yang aktif
            $data['periode_id'] = $periodeAktif->id;

            // Simpan data pendaftaran ke database
            Pendaftaran::create($data);

            // Redirect ke halaman sukses atau halaman lain yang diinginkan
            return redirect()->route('daftar.index')->with('success', 'Pendaftaran berhasil disimpan!');
        } catch (QueryException $e) {
            // Tangani exception yang terkait dengan database
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        } catch (\Exception $e) {
            // Tangani exception umum
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function cancel($id)
    {
        try {
            // Temukan pendaftaran berdasarkan ID
            $pendaftaran = Pendaftaran::findOrFail($id);

            // Set status pendaftaran menjadi dibatalkan
            $pendaftaran->update([
                'is_cancel' => true,
            ]);

            return redirect()->route('daftar.index')->with('success', 'Pendaftaran berhasil dibatalkan.');
        } catch (QueryException $e) {
            // Tangani exception yang terkait dengan database
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membatalkan pendaftaran.');
        } catch (\Exception $e) {
            // Tangani exception umum
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
