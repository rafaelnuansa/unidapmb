<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Fakultas;
use App\Models\Jenjang;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultasList = Fakultas::all();
        return view('admin.fakultas.index', compact('fakultasList'));
    }

    public function create()
    {
         return view('admin.fakultas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'codename' => 'required|string|unique:fakultas',
        ]);

        Fakultas::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('fakultas.index')->with('success', 'Fakultas created successfully.');
    }

    public function edit(Fakultas $fakultas)
    {
        return view('admin.fakultas.edit', compact('fakultas', ));
    }

    public function update(Request $request, Fakultas $fakultas)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'codename' => 'required|string|unique:fakultas,codename,' . $fakultas->id,
        ]);

        $fakultas->update([
            'name' => $request->input('name'),
            'codename' => $request->input('codename'),
        ]);

        return redirect()->route('fakultas.index')->with('success', 'Fakultas updated successfully.');
    }


    public function destroy(Fakultas $fakultas)
    {
        $fakultas->delete();

        return redirect()->route('fakultas.index')->with('success', 'Fakultas deleted successfully.');
    }

}
