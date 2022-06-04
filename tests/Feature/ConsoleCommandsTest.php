<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ConsoleCommandsTest extends TestCase
{
	use DatabaseMigrations;

	public function test_custom_artisan_command_fetch_country_is_successful()
	{
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
