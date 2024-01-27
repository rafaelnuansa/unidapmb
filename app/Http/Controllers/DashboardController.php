<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // Load the user's detail if available
        $detail = $user->detail;

         // Define the fields that contribute to completeness
         $fields = [
            'name', 'phone', 'nama_ibu', 'jenis_kelamin', 'tanggal_lahir',
            'tempat_lahir', 'nisn', 'npwp', 'nik', 'agama_id', 'jalan',
            'rt', 'rw', 'dusun', 'desa',
        ];
        $completeness = $this->calculateCompleteness($detail, $fields);
        return view('dashboard', [
            'user' => $user,
            'detail' => $detail,
            'completeness' => $completeness,
        ]);
    }



    private function calculateCompleteness($detail, $fields)
    {
        $filledFields = 0;

        foreach ($fields as $field) {
            // Check if the field is filled in the detail
            if (!empty($detail->$field)) {
                $filledFields++;
            }
        }

        // Calculate percentage
        $totalFields = count($fields);
        $completeness = round(($filledFields / $totalFields) * 100);

        return $completeness;
    }
}
