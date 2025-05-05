<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request): LoginResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        Auth::attempt($request->only('email', 'password'), $request->filled('remember'));

        // ここでリダイレクト先を指定
        return app(LoginResponse::class)->toResponse($request)->withRedirectUrl('/dictionary/register');
    }
}
