<?php

namespace App\Console\Commands;

use App\Models\Statistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchCountry extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'fetch:country';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'fetch api and store to database';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$this->info('please wait');
		$countries = Http::get('https://devtest.ge/countries')->json();
		foreach ($countries as $country)
		{
			$statistics = Http::post('https://devtest.ge/get-country-statistics', [
				'code'    => $country['code'],
			])->json();
			Statistic::updateOrCreate(
				['code' => $country['code']],
				[
					'country'    => $country['name'],
					'code'       => $statistics['code'],
					'confirmed'  => $statistics['confirmed'],
					'recovered'  => $statistics['recovered'],
					'critical'   => $statistics['critical'],
					'deaths'     => $statistics['deaths'],
				]
			);
		}

		$this->info('success');
	}
}
