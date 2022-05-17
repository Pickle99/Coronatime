<?php

namespace App\Http\Controllers;

class LanguageController extends Controller
{
	public function update($locale)
	{
		session()->put('locale', $locale);

		return redirect()->back();
	}
}
