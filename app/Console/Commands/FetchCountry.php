<?php

namespace App\Console\Commands;

use App\Models\Country;
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
			$api = new Country();
			$api['code'] = $country['code'];
			$api['name'] = $country['name'];
			$api->save();

			$statistics = Http::post('https://devtest.ge/get-country-statistics', [
				'code'    => $country['code'],
			]);
			$statistics = json_decode($statistics);
			$info = new Statistic();
			$info->country = $statistics->country;
			$info->code = $statistics->code;
			$info->country_id = $statistics->id;
			$info->confirmed = $statistics->confirmed;
			$info->recovered = $statistics->recovered;
			$info->critical = $statistics->critical;
			$info->deaths = $statistics->deaths;
			$info->save();
		}

		$this->info('success');
	}
}
