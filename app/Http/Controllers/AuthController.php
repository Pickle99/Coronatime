<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthRequest;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function create()
	{
		return view('components.user.login');
	}

	public function logout()
	{
		auth()->logout();
		return redirect('/login');
	}

	public function store(StoreAuthRequest $request)
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
