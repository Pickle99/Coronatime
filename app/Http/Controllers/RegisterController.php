<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRules;
use App\Models\User;

class RegisterController extends Controller
{
	public function create()
	{
		return view('components.register');
	}

	public function store(ValidationRules $request)
	{
//		$user = User::create($attributes);
//		auth()->login($user);
		$validated = $request->validated();
//		$user = User::create($validated);
//		auth()->login($user);
		// Retrieve a portion of the validated input data...
//		$validated = $request->safe()->only(['username', 'email']);
//		$validated = $request->safe()->except(['name', 'email']);
		return redirect('login');
	}
}
