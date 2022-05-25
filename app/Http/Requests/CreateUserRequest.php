<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
			'username' => 'required|min:3|unique:users,username',
			'email'    => 'required|unique:users,email',
			'password' => 'required|min:3',
			'repeat'   => 'required|same:password',
		];
	}

	public function messages()
	{
		return [
			'username.required'         => 'username_is_required',
			'username.min'              => 'username_must_contain_at_least_3_symbols',
			'username.unique'           => 'username_already_exists',
			'email.required'            => 'email_is_required',
			'email.unique'              => 'email_already_exists',
			'password.required'         => 'password_is_required',
			'password.min'              => 'password_must_contain_at_least_3_symbols',
			'repeat.same'               => 'passwords_dont_match',
			'repeat.required'           => 'repeat_password_is_required',
		];
	}
}
