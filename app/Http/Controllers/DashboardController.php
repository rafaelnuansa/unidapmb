<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\User;
use App\Traits\CompletenessTrait;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use CompletenessTrait;

    public function index(Request $request)
    {
        $user = $request->user();
        $completeness = $this->calculateCompleteness($user->detail, $user->alamat,);

        return view('dashboard', [
            'user' => $user,
            'detail' => $user->detail,
            'completeness' => $completeness,
        ]);
    }



}
