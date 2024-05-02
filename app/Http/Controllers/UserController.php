<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show register form
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formfields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:4',
        ]);

        //hash password
        $formfields['password'] = bcrypt($formfields['password']);

        $user = User::create($formfields);

        auth()->login($user);

        event(new Registered($user));

        return redirect('/')->with('success', 'Successfully logged in!');
    }

    public function verifyNotice()
    {
        return view('auth.verify-email');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->intended();
    }

    public function verifyHandler(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate(); // ?????
        $request->session()->regenerate(); // ?????

        return redirect('/')->with('success', 'User logged out');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $formfields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (auth()->attempt($formfields)) {
            $request->session()->regenerate();

            return redirect('/')->with('success', 'You are logged in!');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');

    }

}
