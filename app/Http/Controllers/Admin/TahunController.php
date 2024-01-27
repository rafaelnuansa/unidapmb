<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TahunAkademik;

class TahunController extends Controller
{
    public function index()
    {
        $tahunAkademiks = TahunAkademik::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.tahun.index', compact('tahunAkademiks'));
    }

    public function create()
    {
        return view('admin.tahun.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:tahun_akademiks',
            ]);

            TahunAkademik::create($request->all());

            return redirect()->route('tahun.index')->with('success', 'Tahun Akademik berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $tahunAkademik = TahunAkademik::findOrFail($id);
        return view('admin.tahun.edit', compact('tahunAkademik'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|unique:tahun_akademiks,name,' . $id,
            ]);

            $tahunAkademik = TahunAkademik::findOrFail($id);
            $tahunAkademik->update($request->all());

            return redirect()->route('tahun.index')->with('success', 'Tahun Akademik berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $tahunAkademik = TahunAkademik::findOrFail($id);
            $tahunAkademik->delete();

            return redirect()->route('tahun.index')->with('success', 'Tahun Akademik berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
