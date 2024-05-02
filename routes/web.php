<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
