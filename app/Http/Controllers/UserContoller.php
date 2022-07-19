<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;


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

    function viewPassword()
    {
        return view('teacher.profile.change-password');
    }

    function updatePassword(Request $request)
    {
        try {
            $teacher = User::query()->whereId(Auth::user()->id)->first();
            $validatedCredentials = $request->validate([
                'new_password' => 'min:3|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'min:3',
            ]);
            if ($teacher) {
                $teacher->password =  Hash::make($validatedCredentials['new_password']);
                $teacher->save();
            }
            return redirect()->back()->withInput()->with('success', 'Password updated successfully.');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Make sure your input is correct.');
        }
    }

    function studentProfile()
    {
        $student = Auth::user();
        return view('student.profile.profile', compact('student'));
    }

    function viewChangePasswordStudentPage()
    {
        return view('student.profile.change-password');
    }

    function viewEditStudentProfile()
    {
        $student = Auth::user();
        return view('student.profile.edit-profile', compact('student'));
    }

    function updateStudent(Request $request)
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
            return redirect('/student/edit-profile')->with('success', 'Profile updated successfully');
        } catch (Exception $e) {
            return redirect('/student/edit-profile')->with('error', 'Could not update profile');
        }
    }

    function viewTeacherProfile(User $user)
    {
        return view('student.teacher-profile', ['teacher' => $user]);
    }

    function viewStudentProfile(User $user)
    {
        $registerdSubjects = collect($user->joinedSubjects)->where('user_id', Auth::user()->id)->all();
        return view('teacher.student', ['student' => $user, 'subjects' => $registerdSubjects]);
    }

    function destroy()
    {
        $user = User::find(Auth::user()->id);
        if (!$user) return response()->json(['success' => false], 404);
        return response()->json([
            'success' =>
            $user->delete(),
            Auth::logout()
        ], 200);
    }

}
