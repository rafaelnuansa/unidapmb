<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;
use Illuminate\Http\Request;

class JenjangController extends Controller
{
    public function index()
    {
        $jenjangs = Jenjang::all();
        return view('admin.jenjang.index', compact('jenjangs'));
    }

    public function create()
    {
        return view('admin.jenjang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Jenjang::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('jenjang.index')->with('success', 'Jenjang created successfully.');
    }

    public function edit(Jenjang $jenjang)
    {
        return view('admin.jenjang.edit', compact('jenjang'));
    }

    public function update(Request $request, Jenjang $jenjang)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $jenjang->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('jenjang.index')->with('success', 'Jenjang updated successfully.');
    }

    public function destroy(Jenjang $jenjang)
    {
        $jenjang->delete();

        return redirect()->route('jenjang.index')->with('success', 'Jenjang deleted successfully.');
    }
}
