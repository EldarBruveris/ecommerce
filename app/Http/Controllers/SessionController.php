<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $credentials = request()->validate([
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credentials)){
            throw ValidationException::withMessages([
                'email' => 'There is no such user with these password and email pair'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/goods');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }
}
