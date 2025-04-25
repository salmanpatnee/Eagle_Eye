<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

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

        $systemExpiryDate = Option::select('value')->where('key', 'system_expired_at')->first();
        $todaysDate = Carbon::today();

        // Bypass expiration check if the user is a superadmin (id = 1)
        if (Carbon::parse($systemExpiryDate->value)->lt($todaysDate) && auth()->user()->id !== 1) {
            auth()->logout();
            throw ValidationException::withMessages([
                'username' => 'Your system trial has expired.'
            ]);
        }

        session()->regenerate();

        return redirect('/home')->with('success', 'Welcome Back!');
    }


    // public function store()
    // {

    //     $attributes = request()->validate([
    //         'username'  => 'required|string',
    //         'password'  => 'required'
    //     ]);


    //     $systemExpiryDate = Option::select('value')->where('key', 'system_expired_at')->first();
    //     $todaysDate = Carbon::today();

    //     if(Carbon::parse($systemExpiryDate->value)->lt($todaysDate)){
    //         throw ValidationException::withMessages([
    //             'username' => 'Your system trail has been expired.'
    //         ]);
    //     }

    //     if (!auth()->attempt($attributes)) {
    //         throw ValidationException::withMessages([
    //             'username' => 'Your provided credentials could not be verified.'
    //         ]);
    //     }

    //     session()->regenerate();

    //     // return redirect()->intended('/')->with('success', 'Welcome Back!');
    //     return redirect('/home')->with('success', 'Welcome Back!');
    // }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
