<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
			'user.required'        => 'username_is_required',
			'user.min'             => 'username_must_contain_at_least_3_symbols',
			'password.required'    => 'password_is_required',
		];
	}
}
