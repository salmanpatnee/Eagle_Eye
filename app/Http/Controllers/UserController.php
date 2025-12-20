<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNotIn('id', [1])
            ->with('role')
            ->orderBy('first_name', 'asc')
            ->paginate(20);


        return view('process.initial-setup.users.index', compact('users'));
    }

    public function create()
    {
        $user = null;
        $userRoles = UserRole::select('id', 'role_name')->get();

        return view('process.initial-setup.users.create', compact('userRoles', 'user'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username'  => 'required|min:3|max:255|unique:users,username',
            'email'     => 'required|email|max:255|unique:users,email',
            'password'  => 'required|min:7|max:255',
            'role_id'  => 'required',
        ]);

        User::create($attributes);

        return redirect(route('users.index'))->with('success', 'User added successfully.');
    }

    public function show(User $user)
    {
        return view('process.initial-setup.users.show', [
            'user'    => $user
        ]);
    }

    public function edit(User $user)
    {
        $userRoles = UserRole::select('id', 'role_name')->get();


        return view('process.initial-setup.users.create', compact('user', 'userRoles'));
    }

    public function update(Request $request, User $user)
    {
        $attributes = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username'  => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')->ignore($user)],
            'email'     => ['required', 'min:3', 'max:255', Rule::unique('users', 'email')->ignore($user)],
            'password'  => ['sometimes'],
            'role_id'  => 'required',
        ]);


        if ($attributes['password'] == null) {
            unset($attributes['password']);
        }

        $user->update($attributes);

        return redirect(route('users.index'))->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'))->with('success', 'User deleted successfully.');
    }

    /**
     * Show the form for editing the authenticated user's profile.
     * This is specifically for non-admin users who can update their own profile information,
     * but cannot change sensitive fields like email or role.
     *
     * @return \Illuminate\View\View
     */
    public function editProfile()
    {
        $user = auth()->user();

        // Authorization check: users can only edit their own profile
        // This is inherently handled by always using auth()->user() instead of route parameters

        // Only pass the user data to the view, not user roles for non-admins
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the authenticated user's profile information.
     * Non-admin users can update their personal details but are restricted from
     * changing sensitive fields like email or role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        // Validation rules for non-admin users (email and role are not allowed to be updated)
        $attributes = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username'  => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')->ignore($user)],
            'password'  => ['nullable', 'min:7', 'max:255'],
        ]);

        // Only update password if it's provided
        if (empty($attributes['password'])) {
            unset($attributes['password']);
        }

        $user->update($attributes);

        return redirect(route('profile.edit'))->with('success', 'Profile updated successfully.');
    }
}
