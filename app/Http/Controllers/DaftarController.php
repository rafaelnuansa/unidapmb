<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Jenjang;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\Pendaftaran; // Make sure to import the Pendaftaran model
use Illuminate\Database\QueryException;

class DaftarController extends Controller
{

    public function index(Request $request)
    {
        $query = Pendaftaran::orderBy('created_at', 'desc');

        // Define the fields that contribute to completeness
        $fields = [
            'name', 'phone', 'nama_ibu', 'jenis_kelamin', 'tanggal_lahir',
            'tempat_lahir', 'nisn', 'npwp', 'nik', 'agama_id', 'jalan',
            'rt', 'rw', 'dusun', 'desa',
        ];

        $user = $request->user();

        // Load the user's detail if available
        $user_detail = $user->detail;
        // Calculate completeness percentage for the registration
        $completeness = $this->calculateCompleteness($user_detail, $fields);

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

        // Anda dapat menambahkan filter berdasarkan kolom lain sesuai kebutuhan

        $registrations = $query->paginate(10);

        return view('daftar.index', compact('registrations'));
    }


    public function form()
    {
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        $beasiswa = Beasiswa::all();

        // Ambil data periode aktif
        $periodeAktif = Periode::where('is_active', true)->first();

        return view('daftar.form', compact('jurusan', 'kelas', 'beasiswa', 'periodeAktif'));
    }


    public function getJenjang()
    {
        $jenjang = Jenjang::with('fakultas.jurusans')->get();

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
                'jurusan_2_id' => 'required|different:jurusan_1_id',
                'jurusan_3_id' => 'required|different:jurusan_1_id,different:jurusan_2_id',
                'kelas_id' => 'required',
                'beasiswa_id' => 'nullable',
            ], [
                'jurusan_3_id.different' => 'Pilihan Jurusan 3 harus berbeda dengan Pilihan Jurusan 1 dan Pilihan Jurusan 2.',
            ]);

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

            // Ambil periode aktif
            $periode = Periode::where('is_active', true)->first();

            if (!$periode) {
                // Jika periode aktif tidak ditemukan, Anda dapat mengambil tindakan tertentu
                return redirect()->back()->with('error', 'Periode aktif tidak ditemukan.');
            }

            // Sesuaikan data periode_id dengan periode yang aktif
            $data['periode_id'] = $periode->id;

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

    private function calculateCompleteness($detail, $fields)
    {
        $filledFields = 0;

        foreach ($fields as $field) {
            // Check if the field is filled in the detail
            if (!empty($detail->$field)) {
                $filledFields++;
            }
        }

        // Calculate percentage
        $totalFields = count($fields);
        $completeness = round(($filledFields / $totalFields) * 100);

        return $completeness;
    }
}
