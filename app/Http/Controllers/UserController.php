<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;


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

        // Check if the user is an admin (role_id = 1) - they should not be forced to change password
        $is_admin = $user->role_id == 1;

        // If the user is not an admin and must change password, show the password update form
        $show_password_update = !$is_admin && $user->must_change_password;

        // Only pass the user data to the view, not user roles for non-admins
        return view('profile.edit', compact('user', 'show_password_update'));
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

        // Check if the user is an admin (role_id = 1) - they should not be forced to change password
        $is_admin = $user->role_id == 1;

        // Check if user must change password
        $must_change_password = !$is_admin && $user->must_change_password;

        // Define validation rules based on whether user must change password
        if ($must_change_password) {
            // When user must change password, require new password fields
            $attributes = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'username'  => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')->ignore($user)],
                'current_password' => 'required',
                'password' => [
                    'required',
                    'min:8',
                    'confirmed',
                    function ($attribute, $value, $fail) use ($user) {
                        $errors = [];

                        // Check for special character
                        if (!preg_match('/[!@#$%^&*()_+\-=\[\]{}|;:,.<>?]/', $value)) {
                            $errors[] = 'at least one special character';
                        }
                        // Check for number
                        if (!preg_match('/[0-9]/', $value)) {
                            $errors[] = 'at least one number';
                        }
                        // Check that password is different from current password
                        if (Hash::check($value, $user->password)) {
                            $fail('The new password cannot be the same as your current password.');
                            return;
                        }

                        if (!empty($errors)) {
                            $fail('The password must contain ' . implode(' and ', $errors) . '.');
                        }
                    }
                ],
                'password_confirmation' => 'required'
            ]);

            // Sanitize input data
            $attributes['first_name'] = strip_tags($attributes['first_name']);
            $attributes['last_name'] = strip_tags($attributes['last_name']);
            $attributes['username'] = strip_tags($attributes['username']);

            // Verify current password
            if (!Hash::check($attributes['current_password'], $user->password)) {
                // Log failed password update attempt
                Log::warning('Failed password update attempt', [
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'attempted_at' => now()
                ]);

                return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }

            // Update the password
            $user->password = $attributes['password'];

            // Set must_change_password to false since user has now updated their password
            $user->must_change_password = false;

            // Only update other profile attributes if provided
            $user->first_name = $attributes['first_name'];
            $user->last_name = $attributes['last_name'];
            $user->username = $attributes['username'];

            $user->save();

            // Flash success message to confirm password update
            session()->flash('success', 'Your password has been updated successfully. You no longer need to change your password.');

            // Log password update for security auditing
            Log::info('Password updated', [
                'user_id' => $user->id,
                'username' => $user->username,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'updated_at' => now()
            ]);
        } else {
            // Normal profile update (password is optional)
            $attributes = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'username'  => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')->ignore($user)],
                'password'  => [
                    'nullable',
                    'min:8',
                    'confirmed',
                    function ($attribute, $value, $fail) use ($user) {
                        // If password is being updated (not null), apply strength requirements
                        if (!empty($value)) {
                            $errors = [];

                            // Check for special character
                            if (!preg_match('/[!@#$%^&*()_+\-=\[\]{}|;:,.<>?]/', $value)) {
                                $errors[] = 'at least one special character';
                            }
                            // Check for number
                            if (!preg_match('/[0-9]/', $value)) {
                                $errors[] = 'at least one number';
                            }
                            // Check that password is different from current password
                            if (Hash::check($value, $user->password)) {
                                $fail('The new password cannot be the same as your current password.');
                                return;
                            }

                            if (!empty($errors)) {
                                $fail('The password must contain ' . implode(' and ', $errors) . '.');
                            }
                        }
                    }
                ],
                'password_confirmation' => 'nullable|required_with:password'
            ]);

            // Sanitize input data
            $attributes['first_name'] = strip_tags($attributes['first_name']);
            $attributes['last_name'] = strip_tags($attributes['last_name']);
            $attributes['username'] = strip_tags($attributes['username']);

            // Only update password if it's provided
            if (!empty($attributes['password'])) {
                $user->password = $attributes['password'];
            }

            // Update other profile attributes
            $user->first_name = $attributes['first_name'];
            $user->last_name = $attributes['last_name'];
            $user->username = $attributes['username'];

            $user->save();
        }

        return redirect(route('profile.edit'))->with('success', 'Profile updated successfully.');
    }
}
