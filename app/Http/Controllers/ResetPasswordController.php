<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserForgotPasswordRequest;
use App\Http\Requests\UserResetPasswordRequest;
use App\Mail\PasswordReset;
use App\Models\ResetPassword;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ResetPasswordController extends Controller
{
	public function reset(UserForgotPasswordRequest $request): RedirectResponse
	{
		$request->validated();
		$token = Str::random(64);
		$user = User::where('email', $request->email)->first();
		$resetPassword = ResetPassword::create([
			'user_id'    => $user->id,
			'email'      => $request->email,
			'token'      => $token,
		]);
		Mail::to($request->email)->send(new PasswordReset($resetPassword));
		return redirect('password/' . $token . '/reset');
	}

	public function edit(string $token, string $user): View
	{
		return view('components.user.reset-password', [
			'token'   => $token,
			'user'    => $user, ]);
	}

	public function update(UserResetPasswordRequest $request, string $token): RedirectResponse
	{
		$request->validated();
		$resetPassword = ResetPassword::where('token', $token)->first();
		$user = User::find($resetPassword->user_id);

		$user->update([
			'password' => bcrypt($request->password),
		]);
		$resetPassword->delete();
		return redirect('/forgot/password/sent');
	}
}
