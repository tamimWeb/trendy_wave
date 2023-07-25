<?php

use App\Http\Controllers\Auth\OtpVerificationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//if session phone_verified is not true then redirect to phone verify route
Route::middleware(['phone_verify'])->group(function () {
    Route::get('/register', function () {
        return redirect()->route('email.verify');
    });
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'customer'])->group(function () {

    Route::get('/wishlist', function () {
        return view('frontend.pages.wishlist.index');
    })->name('wishlist.index');

    Route::get('/my-account', function () {
        return view('frontend.pages.my-account.index');
    })->name('my-account.index');
});

//otp verification group function 
Route::controller(OtpVerificationController::class)->group(function () {
    Route::get('/email-verify', 'emailVerify')->name('email.verify');
    Route::get('/email-otp', 'emailOtpPage')->name('email.otp');
    Route::get('/phone-verify', 'phoneVerify')->name('phone.verify')->middleware('email_verify');
    Route::get('/phone-otp', 'phoneOtpPage')->name('phone.otp')->middleware('email_verify')->middleware('email_verify');

    Route::post('/email-otp/check', 'emailOtpStore')->name('email-otp.store');
    Route::post('/email-otp/verify', 'emailOtpVerify')->name('email-otp.verify');
    Route::post('/phone-otp/check', 'phoneOtpStore')->name('phone-otp.store')->middleware('email_verify');
    Route::post('/phone-otp/verify', 'phoneOtpVerify')->name('phone-otp.verify');
    Route::get('/register', 'register')->name('register')->middleware('email_verify');
});