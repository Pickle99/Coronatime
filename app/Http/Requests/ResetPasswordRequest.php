<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
			'email.required'       => 'Email is required',
			'password.required'    => 'New password is required',
			'password.min'         => 'New password must contain at least 3 symbols',
			'password.confirmed'   => 'Passwords dont match',
			'email.email'          => 'Incorrect email format',
		];
	}
}
