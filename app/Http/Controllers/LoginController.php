<?php

namespace App\Http\Controllers;

class LoginController extends Controller
{
	public function create()
	{
		return view('components.login');
	}

	public function edit()
	{
		return view('components.reset-password');
	}
}
