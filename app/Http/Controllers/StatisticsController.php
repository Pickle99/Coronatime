<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Statistic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatisticsController extends Controller
{
	public function home(): RedirectResponse
	{
		if (auth()->user())
		{
			return redirect()->route('dashboard');
		}

		return redirect()->route('login.view');
	}

	/**
	 * Show country statistics
	 */
	public function index(Request $request): View
	{
		$sortBy = $request->sortBy ?? 'created_at';
		$sortDirection = $request->sortDirection === 'asc' ? 'asc' : 'desc';
		$sortBy = $sortBy === 'country' ? 'country->en' : $sortBy;
		$statistics = Statistic::orderBy($sortBy, $sortDirection)
			->filter($request->toArray('search'))->get();
		return view('components.dashboard', [
			'page'           => request('page'),
			'statistics'     => $statistics,
			'infos'          => Statistic::all(),
			'confirmed'      => Statistic::sum('confirmed'),
			'recovered'      => Statistic::sum('recovered'),
			'deaths'         => Statistic::sum('deaths'),
		]);
	}
}
