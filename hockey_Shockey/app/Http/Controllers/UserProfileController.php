<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'contact_no' => 'required',
            'address_line_1' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
        ]);

        // Update user profile
        $user->update([
            'contact_no' => $request->input('contact_no'),
            'address_line_1' => $request->input('address_line_1'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'postal_code' => $request->input('postal_code'),
        ]);
        return redirect('/userprofile')->with('success', 'Account deleted successfully.');

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
}
