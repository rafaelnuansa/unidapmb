<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\UserAlamat;
use App\Models\UserDetail;
use App\Traits\CompletenessTrait;
use Illuminate\Http\Request;


class ProfileController extends Controller
{

    use CompletenessTrait;

    public function index(Request $request)
    {
        $user = $request->user();

        // Load the user's biodata if available
        $detail = $user->detail;
        // Define the fields that contribute to completeness
        $completeness = $this->calculateCompleteness($user->detail, $user->alamat);

        $agamas = Agama::all();
        return view('profile/edit', [
            'user' => $user,
            'detail' => $detail,
            'completeness' => $completeness,
            'agamas' => $agamas,
        ]);
    }

    public function edit(Request $request)
    {
        $user = $request->user();

        // Load the user's biodata if available
        $detail = $user->detail;
        // Define the fields that contribute to completeness
        $completeness = $this->calculateCompleteness($user->detail, $user->alamat);

        $agamas = Agama::all();
        return view('profile/edit', [
            'user' => $user,
            'detail' => $detail,
            'completeness' => $completeness,
            'agamas' => $agamas,
        ]);
    }


    public function update(Request $request)
    {
        try {
            $user = $request->user();
            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:255',
                'phone' => [
                    'required',
                    'numeric',

                    'unique:users,phone,' . $user->id,
                ],
                'nama_ibu' => 'required|string|max:255',
                'jenis_kelamin' => 'nullable|string|max:255',
                'tanggal_lahir' => 'nullable|date', // Adjust based on your date format
                'tempat_lahir' => 'nullable|string|max:255',
                'nisn' => 'nullable|string|max:255',
                'npwp' => 'nullable|string|max:255',
                'nik' => 'nullable|string|max:255',
                'agama_id' => 'required|numeric|max:255',
                'jalan' => 'nullable|string|max:255',
                'rt' => 'nullable|string|max:255',
                'rw' => 'nullable|string|max:255',
                'dusun' => 'nullable|string|max:255',
                'desa' => 'nullable|string|max:255',
            ]);

            // Update user data
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->save();

            $detail = $user->detail ?? new UserDetail(); // Create new detail if it doesn't exist
            $detail->fill($request->only([
                'nama_ibu',
                'jenis_kelamin',
                'tanggal_lahir',
                'tempat_lahir',
                'nisn', 'npwp', 'nik', 'agama_id',
            ]));
            $detail->user_id = auth()->user()->id;
            $detail->save();

            $alamat = $user->alamat ?? new UserAlamat(); // Create new detail if it doesn't exist
            $alamat->fill($request->only([
                'jalan',
                'rt',
                'rw',
                'dusun',
                'desa',
            ]));
            $alamat->user_id = auth()->user()->id;
            $alamat->save();


            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (ValidationException $e) {


            // If validation fails
            return redirect()->back()->with('error', $e->errors())->withInput();
        } catch (\Exception $e) {
            // If other exceptions occur
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

}
