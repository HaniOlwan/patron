<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserContoller extends Controller
{
    function profile()
    {
        $teacher = Auth::user();
        return view('teacher.profile.profile', compact('teacher'));
    }

    function viewEditProfile()
    {
        $teacher = Auth::user();
        return view('teacher.profile.edit-profile', compact('teacher'));
    }

    function update(Request $request)
    {
        $teacher = User::query()->whereId(Auth::user()->id)->first();
        try {
            $validatedCredentials = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'specialization' => 'required',
                'phone' => 'required',
                'bio' => 'required',
            ]);
            $teacher->update($validatedCredentials);
            return redirect('edit-profile')->with('success', 'Profile updated successfully');
        } catch (Exception $e) {
            return redirect('edit-profile')->with('error', 'Could not update profile');
        }
    }
}
