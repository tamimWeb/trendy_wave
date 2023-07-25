<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        if ($request->role == 'customer') {
            return redirect()->route('home');
        } else {
            return redirect()->route('dashboard');
        }
    }
}
