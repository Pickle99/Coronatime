<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
	public function setLocale($locale)
	{
		session()->put('locale', $locale);

		return redirect()->back();
	}
}
