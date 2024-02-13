<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'phone' => 'required|numeric|min:11|max:13|regex:/^08\d{9,}$/',
            ], [
                'name.required' => 'Nama harus diisi.',
                'name.string' => 'Nama harus berupa teks.',
                'name.max' => 'Nama maksimal 255 karakter.',
                'email.required' => 'Email harus diisi.',
                'email.string' => 'Email harus berupa teks.',
                'email.email' => 'Format email tidak valid.',
                'email.max' => 'Email maksimal 255 karakter.',
                'email.unique' => 'Email sudah digunakan.',
                'password.required' => 'Password harus diisi.',
                'password.string' => 'Password harus berupa teks.',
                'password.min' => 'Password minimal 8 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
                'phone.required' => 'Nomor telepon harus diisi.',
                'phone.numeric' => 'Nomor telepon harus berupa angka.',
                'phone.regex' => 'Format nomor telepon tidak valid. Nomor telepon harus diawali dengan "08" dan terdiri dari 11 sampai 13 digit.',
                'phone.min' => 'Nomor telepon minimal 11 karakter.',
                'phone.max' => 'Nomor telepon maksimal 13 karakter.',

            ]);



            // Create and save the new user
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone; // Using validated phone directly
            $user->password = Hash::make($request->password);
            $user->save();

            // Authenticate the newly registered user
            auth()->login($user);

            // Redirect the user after successful registration
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
