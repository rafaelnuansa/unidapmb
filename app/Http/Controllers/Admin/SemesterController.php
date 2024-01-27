<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;
use App\Models\TahunAkademik;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::with('tahunAkademik')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.semesters.index', compact('semesters'));
    }

    public function create()
    {
        $tahunAkademiks = TahunAkademik::all();
        return view('admin.semesters.create', compact('tahunAkademiks'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'tahun_id' => 'required|exists:tahun_akademiks,id',
            ]);

            Semester::create($request->all());

            return redirect()->route('semesters.index')->with('success', 'Semester berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $semester = Semester::findOrFail($id);
        $tahunAkademiks = TahunAkademik::all();
        return view('admin.semesters.edit', compact('semester', 'tahunAkademiks'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'tahun_id' => 'required|exists:tahun_akademiks,id',
            ]);

            $semester = Semester::findOrFail($id);
            $semester->update($request->all());

            return redirect()->route('semesters.index')->with('success', 'Semester berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $semester = Semester::findOrFail($id);
            $semester->delete();

            return redirect()->route('semesters.index')->with('success', 'Semester berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
