<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.profile.index');
    }

    public function update(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'avatar' => 'nullable|image'
        ]);

        // Get logged in User
        $user = Auth::user();

        // Update user info
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        // upload image
        if ($request->hasFile('avatar')) {
            $user->addMedia($request->avatar)->toMediaCollection('avatar');
        }
        notify()->success('Profile Updated', 'Success');
        return back();
    }

    public function changePassword()
    {
        return view('backend.profile.password');
    }
    
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        $user = Auth::user();
        $hashedPassword = $user->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
                Auth::logout();
                notify('Password Changed', 'Success');
                return redirect()->route('login');
            } else {
                notify()->warning('New password can not be same as old password', 'Warning');
            }
        } else {
            notify()->error('Current Password not match', 'Error');
        }

        return back();
    }
}
