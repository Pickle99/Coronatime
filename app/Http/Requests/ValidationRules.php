<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRules extends FormRequest
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
			__('translate.username')                                                   => 'required|min:3|unique:users,username',
			__('translate.email')                                                      => 'required|min:3|unique:users,email|email',
			__('translate.password')                                                   => 'required|min:3',
			__('translate.Repeat password')                                            => 'required',
		];
	}

	public function messages()
	{
		$required = '.required';
		return [
			__('translate.username') . $required                                                                                                     => 'Username is required',
			__('translate.email') . $required                                                                                                        => 'Email is required',
			__('translate.password') . $required                                                                                                     => 'Password is required',
			__('translate.Repeat password') . $required                                                                                              => 'Repeat password is required',
		];
	}
}
