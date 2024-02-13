<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        // flash()->addSuccess('Test');
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(auth()->user()->is_admin){

                return redirect()->intended('/admin/dashboard')->with('success', 'Logged in as Administrator');
            }
            return redirect()->intended('/dashboard')->with('success', 'Logged in Successfully');
        }

        return redirect()->back()->with('error', 'Mohon cek kembali email dan password anda');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
