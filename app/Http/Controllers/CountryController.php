<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Facades\Http;

class CountryController extends Controller
{
	public function fetch()
	{
//		$countries = Http::get('https://devtest.ge/countries')->json();
		$response = Http::get('https://devtest.ge/countries');
		$countries = json_decode($response, true);
		//        $countires = json_decode($response->body());

		foreach ($countries as $country)
		{
			$api = new Country();

			$api['code'] = $country['code'];
//			$api['name'] = $country['name'];
			$api->name = json_encode(['en' => $country['name']['en'], 'ka' => $country['name']['ka']]);
//		$api->name->ka = $country->name->ka;
//			$api->code = $country->code;
			//			$api->name = [$country->name->en, $country->name->ka];
//			$api->name = ['en' => $country->name->en, 'ka' => $country->name->ka];

			$api->save();
		}

		return 'DONE';
	}
}
