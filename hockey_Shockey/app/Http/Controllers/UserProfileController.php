<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
            'address_line_1' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
        ]);

        // Update user profile
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact_no' => $request->input('contact_no'),
            'address_line_1' => $request->input('address_line_1'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'postal_code' => $request->input('postal_code'),
        ]);
        return redirect('/userprofile')->with('success', 'User Profile updated successfully.');

      }

    public function destroy()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Delete user profile (optional)
        $user->delete();

        // Logout the user (optional)
        Auth::logout();

        return redirect('/')->with('success', 'Account deleted successfully.');
    }

    public function showChangePasswordForm()
{
    return view('change-password');
}
public function updatePassword(Request $request)
{
    $user = Auth::user();

    // Validate the form data
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
    ]);

    // Check if the current password matches the user's password
    if (!Hash::check($request->input('current_password'), $user->password)) {
        return redirect()->route('change-password')->with('error', 'Current password is incorrect.');
    }

    // Update the user's password
    $user->update([
        'password' => Hash::make($request->input('new_password')),
    ]);

    return redirect('/userprofile')->with('success', 'Password updated successfully.');
}
}
