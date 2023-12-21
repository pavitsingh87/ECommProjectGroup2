<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        // Validation logic here
        $this->validateUser($request);

        $userData = $request->all();
        $userData['name'] = $request->input('first_name') . ' ' . $request->input('last_name');
    
        User::create($userData);
        //  User::create($request->all());


        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validation logic here
        
        $this->validateUser($request);

        $user->update($request->all());
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }

    private function validateUser(Request $request)
    {
        $userId = $request->route('user');
    
        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => ['required', 'email', Rule::unique('users')->ignore($userId)],
            'contact_no' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'address_line_1' => 'nullable|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255|regex:/^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/',
            'role_id' => 'required|integer',
        ];
    
        if ($request->isMethod('post')) {
            $rules['password'] = 'required|string|min:8';
        }
    
        return $request->validate($rules);
    }
    
}
