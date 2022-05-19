<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidation extends FormRequest
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
		$passwordCheck = __('translate.password');
		return [
			__('translate.username', ['name' => 'Username'])                                                            => 'required|min:3|unique:users,username',
			__('translate.username', ['name' => 'მომხმარებელი'])                                                            => 'required|min:3|unique:users,username',
			__('translate.email')                                                                                                                              => 'required|unique:users,email',
			__('translate.password')                                                                                                                           => 'required|min:3',
			__('translate.repeat password', ['name' => 'repeat'])                                                     => 'min:3|required_with:' . $passwordCheck . '|same:' . $passwordCheck,
			__('translate.repeat password', ['name' => 'გაიმეორეთ'])                                                     => 'min:3|required_with:' . $passwordCheck . '|same:' . $passwordCheck,
		];
	}

	public function messages()
	{
		$required = '.required';
		$same = '.same';
		$min = '.min';
		return [
			__('translate.username', ['name'=>'Username']) . $required                                                                                    => 'Username is required',
			__('translate.username', ['name'=>'მომხმარებელი']) . $required                                                                                => 'Username is required',
			__('translate.username', ['name'=>'Username']) . $min                                                                                         => 'Username must contain at least 3 symbols',
			__('translate.username', ['name'=>'მომხმარებელი']) . $min                                                                                     => 'Username must contain at least 3 symbols',
			__('translate.email') . $required                                                                                                             => 'Email is required',
			__('translate.password') . $required                                                                                                          => 'Password is required',
			__('translate.password') . $min                                                                                                               => 'Password must contain at least 3 symbols',
			__('translate.repeat password', ['name' => 'repeat']) . $same                                                                           => 'Repeat password is required',
			__('translate.repeat password', ['name' => 'გაიმეორეთ']) . $same                                                                     => 'Repeat password is required',
			__('translate.repeat password', ['name' => 'repeat']) . $min                                                                     => 'Password must contain at least 3 symbols',
			__('translate.repeat password', ['name' => 'გაიმეორეთ']) . $min                                                                     => 'Password must contain at least 3 symbols',
		];
	}
}
