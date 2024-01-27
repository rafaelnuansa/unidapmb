<?php

// app/Http/Controllers/Admin/JurusanController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fakultas;
use App\Models\Jenjang;
use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('admin.jurusans.index', compact('jurusans'));
    }

    public function create()
    {
        $jenjangs = Jenjang::all();
        $fakultas = Fakultas::all();

        return view('admin.jurusans.create', compact('jenjangs', 'fakultas'));
    }


    public function store(Request $request)
    {
        // Validasi form create dan simpan data
        $request->validate([
            'name' => 'required',
            'jenjang_id' => 'required',
            'fakultas_id' => 'required',
        ]);

        Jurusan::create($request->all());

        return redirect()->route('jurusans.index')->with('success', 'Jurusan created successfully');
    }


    public function edit($id)
    {
        $jenjangs = Jenjang::all();
        $fakultas = Fakultas::all();
        $jurusan = Jurusan::findOrFail($id);

        return view('admin.jurusans.edit', compact('jenjangs', 'fakultas', 'jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        // Validasi form edit dan update data
        $request->validate([
            'name' => 'required',
            'jenjang_id' => 'required',
            'fakultas_id' => 'required',
        ]);

        $jurusan->update($request->all());

        return redirect()->route('jurusans.index')->with('success', 'Jurusan updated successfully');
    }

    public function destroy(Jurusan $jurusan)
    {
        // Hapus data
        $jurusan->delete();

        return redirect()->route('jurusans.index')->with('success', 'Jurusan deleted successfully');
    }
}
