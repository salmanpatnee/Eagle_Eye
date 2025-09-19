<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username'  => 'required|string',
            'password'  => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'username' => 'Your provided credentials could not be verified.'
            ]);
        }

        session()->regenerate();

        return redirect(route('compliance'))->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
