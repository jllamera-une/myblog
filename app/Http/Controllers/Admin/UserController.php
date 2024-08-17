<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    public function update(Request $request, User $user): RedirectResponse
    {
        if ($request->filled('password')) {
            $request->merge([
                'password' => Hash::make($request->input('password'))
            ]);
        }

        $user->update(array_filter($request->only(['name', 'email', 'password'])));

        $role_ids = array_values($request->get('roles', []));
        $user->roles()->sync($role_ids);

        return redirect()->route('admin.users.edit', $user)->withSuccess(__('users.updated'));
    }
    // public function index()
    // {
    //     $users = User::all();
    //     return view('admin.users.index', compact('users'));
    // }

    // public function create()
    // {
    //     return view('admin.users.create');
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
