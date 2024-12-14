<?php

namespace App\Http\Controllers;

use App\Models\DoctorProfile;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorProfileController extends Controller
{
    public function create($userId)
    {
        $user = User::findOrFail($userId);
        return view('doctor_profiles.create', compact('user'));
    }

    public function store(Request $request, $userId)
    {
        $request->validate([
            'specialty' => 'required|string|max:255',
            'license_number' => 'required|string|unique:doctor_profiles',
            'bio' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
        ]);

        DoctorProfile::create([
            'user_id' => $userId,
            'specialty' => $request->specialty,
            'license_number' => $request->license_number,
            'bio' => $request->bio,
            'phone' => $request->phone,
        ]);

        return redirect()->route('users.show', $userId)->with('success', 'Doctor profile created successfully.');
    }
}
