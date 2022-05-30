<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\VerifyUser;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
	public function home(): RedirectResponse
	{
		if (auth()->user())
		{
			return redirect('/dashboard');
		}

		return redirect('/login');
	}

	public function createUser(RegisterRequest $request): RedirectResponse
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

	public function verifyEmail(string $token): RedirectResponse
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
}
