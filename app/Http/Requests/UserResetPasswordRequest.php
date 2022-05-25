<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserResetPasswordRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'email'    => 'required|email',
			'token'    => 'required',
			'password' => 'required|min:3|confirmed',
		];
	}

	public function messages()
	{
		return [
			'email.required'       => 'email_is_required',
			'password.required'    => 'new_password_is_required',
			'password.min'         => 'new password_must_contain_at_least_3_symbols',
			'password.confirmed'   => 'passwords_dont_match',
			'email.email'          => 'incorrect_email_format',
		];
	}
}
