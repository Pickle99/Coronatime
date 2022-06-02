<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\VerifiedUser;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
	public function createUser(RegisterRequest $request): RedirectResponse
	{
		$validated = $request->validated();
		$validated['password'] = bcrypt($validated['password']);
		$validated['token'] = Str::random(60);
		$user = User::create($validated);
//		VerifiedUser::create([
//			'token'   => Str::random(60),
//			'user_id' => $user->id,
//		]);
		auth()->login($user);
		Mail::to($user->email)->send(new VerifyEmail($user));
		return redirect()->route('dashboard');
	}

	public function verifyEmail(string $token): RedirectResponse
	{
		$user = User::where('token', $token)->first();
		if (isset($user))
		{
			if (!$user->email_verified_at)
			{
				$user->email_verified_at = Carbon::now();
				$user->save();
				auth()->logout();
				return redirect()->route('verify.success', ['token' => $user->token]);
			}
			return redirect()->route('login.view');
		}

		return redirect()->route('login.view');
	}
}
