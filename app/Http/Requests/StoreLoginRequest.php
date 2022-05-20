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
			'user'                => 'required|min:3',
			'password'            => 'required',
		];
	}

	public function messages()
	{
		return [
			'user.required'        => 'Username is required',
			'user.min'             => 'Username must contain at least :min symbols',
			'password.required'    => 'Password is required',
		];
	}
}
