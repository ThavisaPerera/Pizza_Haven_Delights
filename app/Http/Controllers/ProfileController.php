<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function updateName(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Auth::user()->update(['name' => $request->name]);

        return redirect()->back()->with('success', 'Name updated successfully');
    }

    // Update user's email
    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
        ]);

        Auth::user()->update(['email' => $request->email]);

        return redirect()->back()->with('success', 'Email updated successfully');
    }

    // Update user's phone
    public function updatePhone(Request $request)
    {
        $request->validate([
            'phone' => 'required|string|max:255',
        ]);

        Auth::user()->update(['phone' => $request->phone]);

        return redirect()->back()->with('success', 'Phone updated successfully');
    }

    // Update user's address
    public function updateAddress(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        Auth::user()->update(['address' => $request->address]);

        return redirect()->back()->with('success', 'Address updated successfully');
    }

    // Update user's password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            Auth::user()->update(['password' => Hash::make($request->password)]);
            return redirect()->back()->with('success', 'Password updated successfully');
        } else {
            return redirect()->back()->with('error', 'Old password is incorrect');
        }
    }
}
