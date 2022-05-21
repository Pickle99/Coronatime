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

	public function landing()
	{
		$page = request('page');
		return view('components.dashboard', [
			'page' => $page,
		]);
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
				'user' => 'Your provided credentials could not be verified.',
			]);
		}

		session()->regenerate();
		return redirect('/dashboard');
	}
}
