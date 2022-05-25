<?php

namespace App\Http\Controllers;

class LanguageController extends Controller
{
	public function setLocale($locale)
	{
		session()->put('locale', $locale);

		return redirect()->back();
	}
}
