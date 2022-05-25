<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Info;

class StatisticsController extends Controller
{
	public function index()
	{
		$countries = Country::all();

		$infos = Info::all();
		$page = request('page');
		$confirmed = Info::sum('confirmed');
		$recovered = Info::sum('recovered');
		$deaths = Info::sum('deaths');

		if (request()->get('search'))
		{
			$countries = Country::latest()->filter(request(['search']))->get();
		}

		//for by country name sroting

		if (request()->get('sort') === 'country_desc')
		{
			$countries = Country::orderByDesc(Info::select('country')->whereColumn('infos.country_id', 'countries.id'))->get();
		}
		if (request()->get('sort') === 'country_asc')
		{
			$countries = Country::orderBy(Info::select('country')->whereColumn('infos.country_id', 'countries.id'))->get();
		}

		//        for new cases sorting
		if (request()->get('sort') === 'cases_desc')
		{
			$countries = Country::orderByDesc(Info::select('confirmed')->whereColumn('infos.country_id', 'countries.id'))->get();
		}
		if (request()->get('sort') === 'cases_asc')
		{
			$countries = Country::orderBy(Info::select('confirmed')->whereColumn('infos.country_id', 'countries.id'))->get();
		}

		// for deaths sorting
		if (request()->get('sort') === 'deaths_desc')
		{
			$countries = Country::orderByDesc(Info::select('deaths')->whereColumn('infos.country_id', 'countries.id'))->get();
		}
		if (request()->get('sort') === 'deaths_asc')
		{
			$countries = Country::orderBy(Info::select('deaths')->whereColumn('infos.country_id', 'countries.id'))->get();
		}

		//for recovered sorting
		if (request()->get('sort') === 'recovered_desc')
		{
			$countries = Country::orderByDesc(Info::select('recovered')->whereColumn('infos.country_id', 'countries.id'))->get();
		}
		if (request()->get('sort') === 'recovered_asc')
		{
			$countries = Country::orderBy(Info::select('recovered')->whereColumn('infos.country_id', 'countries.id'))->get();
		}
		{
			return view('components.dashboard', [
				'page'          => $page,
				'countries'     => $countries,
				'infos'         => $infos,
				'confirmed'     => $confirmed,
				'recovered'     => $recovered,
				'deaths'        => $deaths,
			]);
		}
	}
}
