<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulirController extends Controller
{


    public function index(Request $request)
    {
        $user = $request->user();
        $detail = $user->detail;

        return view('formulir.biodata', [
            'biodata' => $detail,
        ]);
    }

    public function biodata_store()
    {

    }

    public function alamat()
    {
        return view('formulir.alamat');
    }

    public function alamat_store()
    {
    }

    public function kerja()
    {
        return view('formulir.kerja');
    }

    public function kerja_store()
    {
    }

    public function ayah()
    {
        return view('formulir.ayah');
    }

    public function ayah_store()
    {
    }

    public function ibu()
    {
        return view('formulir.ibu');
    }

    public function ibu_store()
    {
    }

    public function wali()
    {
        return view('formulir.wali');
    }

    public function wali_store()
    {
    }

    public function lampiran()
    {
        return view('formulir.lampiran');
    }

    public function lampiran_store()
    {
    }
}
