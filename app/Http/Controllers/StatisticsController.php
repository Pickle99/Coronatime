<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatisticsController extends Controller
{
	/*
	Show country statistics
	*/
	public function index(Request $request): View
	{
		$sortBy = $request->sortBy ?? 'created_at';
		$sortDirection = $request->sortDirection === 'asc' ? 'asc' : 'desc';
		$countries = Country::orderBy(Info::select($sortBy)->whereColumn('infos.country_id', 'countries.id'), $sortDirection)
			->latest()->filter(request(['search']))->get();
		$infos = Info::all();
		$page = request('page');
		$confirmed = Info::sum('confirmed');
		$recovered = Info::sum('recovered');
		$deaths = Info::sum('deaths');

		return view('components.dashboard', [
			'page'          => $page,
			'countries'     => $countries,
			'infos'         => $infos,
			'confirmed'     => number_format($confirmed),
			'recovered'     => number_format($recovered),
			'deaths'        => number_format($deaths),
		]);
	}
}
