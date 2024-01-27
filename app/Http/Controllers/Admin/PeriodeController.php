<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\Semester;

class PeriodeController extends Controller
{
    public function index()
    {
        $periodes = Periode::with('semester')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.periodes.index', compact('periodes'));
    }

    public function create()
    {
        $semesters = Semester::all();
        return view('admin.periodes.create', compact('semesters'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'semester_id' => 'required|exists:semesters,id',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'discount_information' => 'required',
            ]);

            Periode::create($request->all());

            return redirect()->route('periodes.index')->with('success', 'Periode berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $periode = Periode::findOrFail($id);
        $semesters = Semester::all();
        return view('admin.periodes.edit', compact('periode', 'semesters'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'semester_id' => 'required|exists:semesters,id',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
                'discount_information' => 'required',
            ]);

            $periode = Periode::findOrFail($id);
            $periode->update($request->all());

            return redirect()->route('periodes.index')->with('success', 'Periode berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $periode = Periode::findOrFail($id);
            $periode->delete();

            return redirect()->route('periodes.index')->with('success', 'Periode berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
