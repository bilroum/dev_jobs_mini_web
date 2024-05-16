<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
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

        $user = User::where('email', $formfields['email'])->first();

        if ($user) {
            if ($user->provider === 'google') {
                // return redirect('/login')->withErrors(['password' =>'You are registerd via Google. Please login via Google option']);
                return redirect("/auth/{$user->provider}/redirect");
            }

            if (auth()->attempt($formfields)) {
                $request->session()->regenerate();

                return redirect('/')->with('success', 'You are logged in!');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');

    }

    public function passwordRequest()
    {
        return view('auth.forgot-password');
    }

    public function passwordHandler(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
        ? redirect('/auth-waiting')
        : back()->withErrors(['success' => __($status)]);
    }

    public function waiting()
    {
        return view('auth.waiting');
    }

    public function getPasswordToken(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function handleNewPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('success', __($status))
        : back()->withErrors(['email' => [__($status)]]);
    }
}
