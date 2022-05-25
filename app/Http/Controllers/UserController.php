<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
	public function create()
	{
		return view('components.user.register');
	}

	public function store(CreateUserRequest $request)
	{
		$validated = $request->validated();
		$validated['password'] = bcrypt($validated['password']);
		$user = User::create($validated);
		event(new Registered($user));
		auth()->login($user);
		return redirect('/dashboard');
	}

	public function verifyEmail(Request $request)
	{
		return view('components.user.email-verify');
	}

	public function verified(EmailVerificationRequest $request)
	{
		$request->fulfill();
		return redirect('/dashboard');
	}
}
