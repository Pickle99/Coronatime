<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\VerifyUser;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
		VerifyUser::create([
			'token'   => Str::random(60),
			'user_id' => $user->id,
		]);
		auth()->login($user);
		Mail::to($user->email)->send(new VerifyEmail($user));
		return redirect('/dashboard');
	}

//	public function verified(EmailVerificationRequest $request)
//	{
//		$request->fulfill();
//		auth()->logout();
//		return redirect('/login');
//	}

	public function verifyEmail($token)
	{
		$verifiedUser = VerifyUser::where('token', $token)->first();
		if (isset($verifiedUser))
		{
			$user = $verifiedUser->user;
			if (!$user->email_verified_at)
			{
				$user->email_verified_at = Carbon::now();
				$user->save();
				auth()->logout();
				return redirect('/verification/success/' . $user->verifyUser->token);
			}
			return redirect('/login');
		}

		return redirect('/login');
	}

	public function success()
	{
		auth()->logout();
	}
}
