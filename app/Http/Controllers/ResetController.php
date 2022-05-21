<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreForgotRequest;
use App\Http\Requests\StoreResetRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetController extends Controller
{
	public function forgot()
	{
		return view('components.forgot-password');
	}

	public function reset(StoreForgotRequest $request)
	{
		$status = Password::sendResetLink(
			$request->only('email')
		);

		return $status === Password::RESET_LINK_SENT
			? redirect('/verify-sent')
			: back()->withErrors(['email' => __($status)]);
	}

	public function sent()
	{
		return view('components.email-verify');
	}

	public function edit($token, $user)
	{
		return view('components.reset-password', [
			'token'   => $token,
			'user'    => $user, ]);
	}

	public function update(StoreResetRequest $request)
	{
		$status = Password::reset(
			$request->only('password', 'password_confirmation', 'token', 'email'),
			function ($user, $password) {
				$user->forceFill([
					'password' => Hash::make($password),
				])->setRememberToken(Str::random(60));

				$user->save();

				event(new PasswordReset($user));
			}
		);

		return $status === Password::PASSWORD_RESET
			? redirect('login')
			: back()->withErrors(['email' => [__($status)]]);
	}
}
