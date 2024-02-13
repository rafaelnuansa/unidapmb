<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class DaftarController extends Controller
{
    public function index()
    {
        // Retrieve unprocessed registrations
        $registrations = Pendaftaran::latest()->paginate(10);

        return view('admin.daftar.index', compact('registrations'));
    }

    public function show($id)
    {
        // Retrieve a specific registration for detailed view
        $registration = Pendaftaran::findOrFail($id);
        return view('admin.daftar.show', compact('registration'));
    }

    public function verify($id)
    {
        // Update the registration status to 'verified'
        $registration = Pendaftaran::findOrFail($id);
        $registration->update(['status' => 'verified']);

        return redirect()->route('admin.daftar.index')->with('success', 'Registration verified successfully.');
    }

    public function reject($id)
    {
        // Update the registration status to 'rejected'
        $registration = Pendaftaran::findOrFail($id);
        $registration->update(['status' => 'rejected']);

        return redirect()->route('admin.daftar.index')->with('success', 'Registration rejected successfully.');
    }

    public function cancel($id)
    {
        // Update the registration status to 'canceled'
        $registration = Pendaftaran::findOrFail($id);
        $registration->update(['status' => 'canceled']);

        return redirect()->route('admin.daftar.index')->with('success', 'Registration canceled successfully.');
    }
}
