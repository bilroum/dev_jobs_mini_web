<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {

        return Socialite::driver($provider)->redirect();

    }

    public function callback($provider)
    {
        try {
            $providerUser = Socialite::driver($provider)->user();
            // if (User::where('email', $providerUser->getEmail())->exists()) {
            //     return redirect('/login')->withErrors(['email' => 'This User has another signin method.']);
            // }

            $user = User::where([
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
            ])->first();

            if (!$user) {
                $user = User::create([
                    'name' => $providerUser->getName(),
                    'email' => $providerUser->getEmail(),
                    'provider' => $provider,
                    'provider_id' => $providerUser->getId(),
                    'provider_token' => $providerUser->token,
                    'provider_refresh_token' => $providerUser->refreshToken,
                    'email_verified_at' => now(),
                ]);
            }

            Auth::login($user);

            return redirect('/');

        } catch (\Exception $e) {
            return redirect('/login');
        }
    }
}
