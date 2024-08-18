<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;


class UserController extends Controller
{
    /**
     * Show the application users index.
     */
    public function index(): View
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the data including role
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:admin,author,user', 
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update user details
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Update the user's role
        $user->role = $request->input('role');

        // Save the updated user
        $user->update($data);

        // Redirect with flash data to users.show
        return redirect()->route('admin.users.index', $user->id)->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function create()
    {
        return view('admin.users.create');
    }
    // public function index()
    // {
    //     $users = User::all();
    //     return view('admin.users.index', compact('users'));
    // }

    

    // public function store(Request $request)
    // {
    //     // Validation and storing logic
    // }

    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('admin.users.edit', compact('user'));
    // }

    // public function update(Request $request, $id)
    // {
    //     // Validation and update logic
    // }

    // public function destroy($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->delete();
    //     return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    // }
}
