<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $classes = Kelas::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.kelas.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.kelas.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'code' => 'required|unique:kelas',
                'name' => 'required',
            ]);

            Kelas::create($request->all());

            return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $class = Kelas::findOrFail($id);
        return view('admin.kelas.edit', compact('class'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'code' => 'required|unique:kelas,code,' . $id,
                'name' => 'required',
            ]);

            $class = Kelas::findOrFail($id);
            $class->update($request->all());

            return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $class = Kelas::findOrFail($id);
            $class->delete();

            return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


}
