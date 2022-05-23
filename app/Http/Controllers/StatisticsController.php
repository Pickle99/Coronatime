<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Info;

class StatisticsController extends Controller
{
	public function index()
	{
		$infos = Info::all();
		$page = request('page');
		$confirmed = Info::sum('confirmed');
		$recovered = Info::sum('recovered');
		$deaths = Info::sum('deaths');

		return view('components.dashboard', [
			'page'          => $page,
			'countries'     => Country::latest()->filter(request(['search']))->get(),
			'infos'         => $infos,
			'confirmed'     => $confirmed,
			'recovered'     => $recovered,
			'deaths'        => $deaths,
		]);
	}
}
