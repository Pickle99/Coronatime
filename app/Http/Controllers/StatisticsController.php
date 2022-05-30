<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Info;
use Illuminate\View\View;

class StatisticsController extends Controller
{
	/*
	Show country statistics
	*/
	public function index(): View
	{
		$countries = Country::latest()->filter(request(['search']))->get();
		$infos = Info::all();
		$page = request('page');
		$confirmed = Info::sum('confirmed');
		$recovered = Info::sum('recovered');
		$deaths = Info::sum('deaths');

		//for by country name sorting
		if (request()->get('sort') === 'country_desc')
		{
			$countries = Country::orderBy(Info::select('country')->whereColumn('infos.country_id', 'countries.id'), 'desc')
					->latest()->filter(request(['search']))->get();
		}
		if (request()->get('sort') === 'country_asc')
		{
			$countries = Country::orderBy(Info::select('country')->whereColumn('infos.country_id', 'countries.id'), 'asc')
					->latest()->filter(request(['search']))->get();
		}

		//   for new cases sorting
		if (request()->get('sort') === 'cases_desc')
		{
			$countries = Country::orderBy(Info::select('confirmed')->whereColumn('infos.country_id', 'countries.id'), 'desc')
					->latest()->filter(request(['search']))->get();
		}
		if (request()->get('sort') === 'cases_asc')
		{
			$countries = Country::orderBy(Info::select('confirmed')->whereColumn('infos.country_id', 'countries.id'), 'asc')
					->latest()->filter(request(['search']))->get();
		}

		// for deaths sorting
		if (request()->get('sort') === 'deaths_desc')
		{
			$countries = Country::orderBy(Info::select('deaths')->whereColumn('infos.country_id', 'countries.id'), 'desc')
					->latest()->filter(request(['search']))->get();
		}
		if (request()->get('sort') === 'deaths_asc')
		{
			$countries = Country::orderBy(Info::select('deaths')->whereColumn('infos.country_id', 'countries.id'), 'asc')
					->latest()->filter(request(['search']))->get();
		}

		//for recovered sorting
		if (request()->get('sort') === 'recovered_desc')
		{
			$countries = Country::orderBy(Info::select('recovered')->whereColumn('infos.country_id', 'countries.id'), 'desc')
					->latest()->filter(request(['search']))->get();
		}
		if (request()->get('sort') === 'recovered_asc')
		{
			$countries = Country::orderBy(Info::select('recovered')->whereColumn('infos.country_id', 'countries.id'), 'asc')
					->latest()->filter(request(['search']))->get();
		}

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
