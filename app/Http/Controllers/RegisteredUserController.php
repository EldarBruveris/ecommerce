<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.registration');
    }

    public function store()
    {
        $validatedAttributes = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create($validatedAttributes);

        Auth::login($user);

        return redirect('/goods');
    }
}
