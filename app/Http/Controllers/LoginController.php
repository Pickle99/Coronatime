<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	public function create()
	{
		return view('components.login');
	}

	public function edit()
	{
		return view('components.reset-password');
	}

	public function check()
	{
		return view('components.checker');
	}

	public function see()
	{
		auth()->logout();
		return redirect('/login');
	}

	public function store(StoreLoginRequest $request)
	{
		$field = filter_var($request->user, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

		if (!auth()->attempt([
			$field    => $request->user,
			'password'=> $request->password,
		]))
		{
			throw ValidationException::withMessages([
				'user' => 'Your provided credentials could not be verified.',
			]);
		}

		session()->regenerate();
		return redirect('/dashboard');
	}
}
