<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
	public function create()
	{
		return view('components.register');
	}

	public function store(StoreUserRequest $request)
	{
		$validated = $request->validated();
		$validated['password'] = bcrypt($validated['password']);
		$user = User::create($validated);
		event(new Registered($user));
		auth()->login($user);

		// Retrieve a portion of the validated input data...
//		$validated = $request->safe()->only(['username', 'email']);
//		$validated = $request->safe()->except(['name', 'email']);
		return redirect('/dashboard');
	}

	public function verifyEmail(Request $request)
	{
		return view('components.email-verify');
	}

	public function verified(EmailVerificationRequest $request)
	{
		$request->fulfill();
		return redirect('/dashboard');
	}
}
