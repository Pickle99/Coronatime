<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function logout()
	{
		auth()->logout();
		return redirect('/login');
	}

	public function login(AuthRequest $request)
	{
		$field = filter_var($request->user, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		if (!auth()->attempt([
			$field    => $request->user,
			'password'=> $request->password,
		]))
		{
			throw ValidationException::withMessages([
				'user' => 'your_provided_credentials_could_not_be_verified',
			]);
		}

		session()->regenerate();
		return redirect('/dashboard');
	}
}
