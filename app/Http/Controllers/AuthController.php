<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function logout(): RedirectResponse
	{
		auth()->logout();
		return redirect()->route('login.view');
	}

	public function login(LoginRequest $request): RedirectResponse
	{
		$field = filter_var($request->user, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		if (!auth()->attempt([
			$field                 => $request->user,
			'password'             => $request->password,
		], $request->remember))
		{
			throw ValidationException::withMessages([
				'user'         => 'Your provided credentials could not be verified',
				'password'     => 'Your provided credentials could not be verified',
			]);
		}

		session()->regenerate();

		return redirect()->route('dashboard');
	}
}
