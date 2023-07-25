<?php

use App\Http\Controllers\Backend\OthersController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.pages.home.index');
})->name('home');

Route::get('/shop', function () {
    return view('frontend.pages.shop.index');
})->name('shop.index');

Route::get('/product-details', function () {
    return view('frontend.pages.product.product-details');
})->name('product.details');

Route::get('/blog', function () {
    return view('frontend.pages.blog.index');
})->name('blog.index');

Route::get('/blog-details', function () {
    return view('frontend.pages.blog.details');
})->name('blog.details');

Route::get('about-us', function () {
    return view('frontend.pages.about-us.index');
})->name('about-us.index');

Route::get('contact-us', function () {
    return view('frontend.pages.contact-us.index');
})->name('contact-us.index');

//others
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/status-update', [OthersController::class, 'statusUpdate'])->name('status.update');
});

