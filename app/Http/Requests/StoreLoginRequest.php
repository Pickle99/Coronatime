<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginRequest extends FormRequest
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
			$this->username()                               => 'required|min:3',
			'password'                                      => 'required',
		];
	}

	public function messages()
	{
		return [
			'username.required'    => 'Username is required',
			'username.min'         => 'Username must contain at least :min symbols',
			'email.required'       => 'Email is required',
			'password.required'    => 'Password is required',
		];
	}

	public function username()
	{
		$login = request()->input('username');
		$field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		request()->merge([$field => $login]);
		return $field;
	}
}
