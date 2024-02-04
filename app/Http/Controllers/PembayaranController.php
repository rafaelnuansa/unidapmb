<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function pembayaran($encryptRegistNumber)
    {
        $regisNumber = decrypt($encryptRegistNumber);
        $pendaftaran = Pendaftaran::where('registration_number', $regisNumber)->first();

        if(!$pendaftaran)
        {
            redirect()->back()->with('error', 'Pendaftaran tidak ditemukan');
        }
        return view('pembayaran.pembayaran');
    }
}
