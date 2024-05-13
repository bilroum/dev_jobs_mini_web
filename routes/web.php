<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', [ListingController::class, 'index']);

Route::get('/listings/create', [ListingController::class, 'create'])->middleware(['auth', 'verified']);

Route::get('/listings/listings', [ListingController::class, 'listings']);

//store lisating data
Route::post('/listings', [ListingController::class, 'store'])->middleware(['auth', 'verified']);

//show edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware(['auth', 'verified']);

//store the edited listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware(['auth', 'verified']);

//delete a listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware(['auth', 'verified']);

Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show register Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store'])->middleware('guest');

//Email verification Notice
Route::get('/email/verify', [UserController::class, 'verifyNotice'])->middleware('auth')->name('verification.notice');
//Email verification Email
Route::get('/email/verify/{id}/{hash}', [UserController::class, 'verifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');
//Resending Email
Route::post('/email/verification-notification', [UserController::class, 'verifyHandler'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Show the view resetpassword
Route::get('/forgot-password', [UserController::class, 'passwordRequest'])->middleware('guest')->name('password.request');

//Handling the form submission
Route::post('/forgot-password', [UserController::class, 'passwordHandler'])->middleware('guest')->name('password.email');
Route::get('/auth-waiting', [UserController::class, 'waiting'])->middleware('guest');

//Show the view for registrate new password
Route::get('/reset-password/{token}', [UserController::class, 'getPasswordToken'])->middleware('guest')->name('password.reset');

//Handling the form submission for the new password and update it
Route::post('/reset-password', [UserController::class, 'handleNewPassword'])->middleware('guest')->name('password.update');

Route::get('/auth/redirect', function () {
    try {
        return Socialite::driver('google')->redirect();
    } catch (Exception $e) {
        // Handle any exceptions that occur during the authentication process
        //dd($e);
        return redirect()->route('login')->with('success', 'An error occurred during Google authentication.');
    }
});

Route::get('/auth/callback', function () {
    try {
        $googleUser = Socialite::driver('google')->user();

        if (!$googleUser) {
            // Handle the case where the user's information could not be retrieved
            return redirect()->route('login')->with('error', 'Failed to retrieve user information from Google.');
        }

        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);

        // Log in the user
        Auth::login($user);

        // Redirect the user to the desired location
        return redirect('/');
    } catch (Exception $e) {
        // Handle any other exceptions that may occur during the authentication process
        return redirect()->route('login')->with('error', 'An error occurred during Google authentication.');
    }
});
