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

		return view('components.dashboard', [
			'page'          => request('page'),
			'countries'     => $countries,
			'infos'         => Info::all(),
			'confirmed'     => Info::sum('confirmed'),
			'recovered'     => Info::sum('recovered'),
			'deaths'        => Info::sum('deaths'),
		]);
	}
}
