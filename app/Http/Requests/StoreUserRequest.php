<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
			'username.required'         => 'Username is required',
			'username.min'              => 'Username must contain at least :min symbols',
			'username.unique'           => 'Username already exists',
			'email.required'            => 'Email is required',
			'email.unique'              => 'Email already exists',
			'password.required'         => 'Password is required',
			'password.min'              => 'Password must contain at lesat :min symbols',
			'repeat.same'               => 'Passwords dont match',
			'repeat.required'           => 'Repeat password is required',
		];
	}
}
