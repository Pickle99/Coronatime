<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
	public function create()
	{
		return view('components.register');
	}

	public function store(StoreRegisterRequest $request)
	{
		$validated = $request->validated();
		$validated['password'] = bcrypt($validated['password']);
		$user = User::create($validated);
		auth()->login($user);

		// Retrieve a portion of the validated input data...
//		$validated = $request->safe()->only(['username', 'email']);
//		$validated = $request->safe()->except(['name', 'email']);
		return redirect('/dashboard');
	}
}
