<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ConsoleCommandsTest extends TestCase
{
	use DatabaseMigrations;

	public function test_custom_artisan_command_fetch_country_is_successful()
	{
		Http::fake([
			'https://devtest.ge/get-country-statistics' => Http::response([
				'country'        => json_encode(['en' => 'Georgia', 'ka' => 'საქართველო']),
				'code'           => 'GE',
				'confirmed'      => 99,
				'recovered'      => 198,
				'critical'       => 297,
				'deaths'         => 396,
			], 200, ['Headers']),
			'https://devtest.ge/countries' => Http::response([
				['code' => 'GE', 'name' => ['en' => 'Georgia', 'ka' => 'საქართველო']],
				[
					'code' => 'US',
					'name' => [
						'en' => 'United States of America',
						'ka' => 'ამერიკის შეერთებული შტატები',
					],
				],
				['code' => 'ZW', 'name' => ['en' => 'Zimbabwe', 'ka' => 'ზიმბაბვე']],
			]),
		]);
		$this->artisan('fetch:country')->expectsOutput('success')
			->assertExitCode(0);
	}

	public function test_custom_artisan_command_clear_unverified_users_is_successful()
	{
		$this->artisan('clear:reset-passwords-token')->expectsOutput('Reset passwords token successfully deleted from database')
			->assertExitCode(0);
	}

	public function test_custom_artisan_command_clear_reset_passwords_token_is_successful()
	{
		$this->artisan('clear:unverified-users')->expectsOutput('Unverified users successfully deleted from database')
			->assertExitCode(0);
	}
}
