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

//	public function store(StoreLoginRequest $request)
//	{
//		$validated = $request->validated();
//
//		// Retrieve a portion of the validated input data...
	////		$validated = $request->safe()->only(['username', 'email']);
	////		$validated = $request->safe()->except(['name', 'email']);
//		return redirect('/dashboard');
//	}

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
		$validated = $request->validated();

//		$attributes = request()->validate([
//			$this->username()   => 'required|min:3',
//			'password'          => 'required',
//		]);
//		dd(!auth()->attempt($attributes));
		if (!auth()->attempt($validated))
		{
			throw ValidationException::withMessages([
				'username' => 'Your provided credentials could not be verified.',
			]);
		}

		session()->regenerate();
		return redirect('/dashboard');
	}

	public function username()
	{
		$login = request()->input('username');
		$field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		request()->merge([$field => $login]);
		return $field;
	}
}
