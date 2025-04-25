<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNotIn('id', [1])
            ->with('role')
            ->orderBy('first_name', 'asc')
            ->get();


        return view('4-Process.1-InitialSetup.users.index', compact('users'));
    }

    public function create()
    {
        $userRoles = UserRole::select('id', 'role_name')->get();

        return view('4-Process.1-InitialSetup.users.create', compact('userRoles'));
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

        return redirect(route('users.index'))->with('message', 'User added successfully.');
    }

    public function show(User $user)
    {
        return view('4-Process.1-InitialSetup.users.show', [
            'user'    => $user
        ]);
    }

    public function edit(User $user)
    {
        $userRoles = UserRole::select('id', 'role_name')->get();


        return view('4-Process.1-InitialSetup.users.edit', compact('user', 'userRoles'));
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

        return redirect(route('users.index'))->with('message', 'User updated successfully.');
    }

    public function destroy(Request $request)
    {
        $attributes =  $request->validate([
            'record' => ['required'],
        ]);

        User::where('id', $attributes['record'])->delete();


        return redirect(route('users.index'))->with('message', 'User deleted.');
    }
}
