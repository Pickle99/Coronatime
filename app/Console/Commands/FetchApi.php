<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\Info;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchApi extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'api:fetch';

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
		$get = Http::get('https://devtest.ge/countries');
		$countries = json_decode($get, true);
		foreach ($countries as $country)
		{
			$api = new Country();
			$api['code'] = $country['code'];
			$api['name'] = $country['name'];
			$api->save();

			$post = Http::post('https://devtest.ge/get-country-statistics', [
				'code'    => $country['code'],
			]);
			$data = json_decode($post);
			$info = new Info();
			$info->country = $data->country;
			$info->code = $data->code;
			$info->country_id = $data->id;
			$info->confirmed = $data->confirmed;
			$info->recovered = $data->recovered;
			$info->critical = $data->critical;
			$info->deaths = $data->deaths;
			$info->save();
		}

		$this->info('success');
	}
}
