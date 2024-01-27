<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
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

        $recent_activity = $user->activities()
        ->latest()
        ->take(5) // Adjust the number of recent activities you want to retrieve
        ->get();

        // Calculate completeness percentage
        $completeness = $this->calculateCompleteness($detail, $fields);


        return view('profile.index', [
            'user' => $user,
            'detail' => $detail,
            'completeness' => $completeness,
            'recent_activity' => $recent_activity,
        ]);
    }
    /**
     * Display the user profile.
     */
    public function edit(Request $request)
    {
        $user = $request->user();

        // Load the user's biodata if available
        $detail = $user->detail;
        // Define the fields that contribute to completeness
        $fields = [
            'name', 'phone', 'nama_ibu', 'jenis_kelamin', 'tanggal_lahir',
            'tempat_lahir', 'nisn', 'npwp', 'nik', 'agama_id', 'jalan',
            'rt', 'rw', 'dusun', 'desa',
        ];
        $completeness = $this->calculateCompleteness($detail, $fields);
        return view('profile/edit', [
            'user' => $user,
            'detail' => $detail,
            'completeness' => $completeness,
        ]);
    }
    /**
     * Update the user profile.
     */
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
                'nama_ibu' => 'nullable|string|max:255',
                'jenis_kelamin' => 'nullable|string|max:255',
                'tanggal_lahir' => 'nullable|date', // Adjust based on your date format
                'tempat_lahir' => 'nullable|string|max:255',
                'nisn' => 'nullable|string|max:255',
                'npwp' => 'nullable|string|max:255',
                'nik' => 'nullable|string|max:255',
                'agama_id' => 'nullable|string|max:255',
                'jalan' => 'nullable|string|max:255',
                'rt' => 'nullable|string|max:255',
                'rw' => 'nullable|string|max:255',
                'dusun' => 'nullable|string|max:255',
                'desa' => 'nullable|string|max:255',
            ]);

            // Update user data
            $user->update([
                'name' => $request->name,
                'phone' => $request->phone,
            ]);

            // Update or create detail
            $user->detail()->updateOrCreate([], $request->only([
                'nama_ibu', 'jenis_kelamin', 'tanggal_lahir', 'tempat_lahir',
                'nisn', 'npwp', 'nik', 'agama_id', 'jalan', 'rt', 'rw', 'dusun', 'desa',
            ]));

            //   return response()->json(['message' => 'Update successfully']);

            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch (ValidationException $e) {

            //   return response()->json(['message' => $e->errors]);
            // If validation fails
            return redirect()->back()->with('error', $e->errors())->withInput();
        } catch (\Exception $e) {
            // If other exceptions occur
            return redirect()->back()->with('error', $e->getMessage());
        }
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
