<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        if (Auth::user()->role == 'customer') {
            return redirect()->route('home');
        } else {
            return redirect()->route('dashboard');
        }
    }
}
