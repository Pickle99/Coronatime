<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
	use RefreshDatabase;

	use DatabaseMigrations;

	public function test_register_page_is_accessible()
	{
		$response = $this->get(route('register.view'));
		$response->assertSuccessful();
		$response->assertViewIs('components.user.register');
	}

	public function test_register_should_give_us_errors_if_input_is_not_provided()
	{
		$response = $this->post(route('register.store'));
		$response->assertSessionHasErrors(
			[
				'username',
				'email',
				'password',
				'repeat',
			]
		);
	}

	public function test_register_should_give_us_user_error_if_we_wont_provide_only_password_input()
	{
		$response = $this->post(route('register.store'), [
			'password' => 'my-so-secret-password',
		]);

		$response->assertSessionHasErrors(
			[
				'username',
				'email',
				'repeat',
			]
		);
		$response->assertSessionDoesntHaveErrors(['password']);
	}

	public function test_register_should_give_us_password_error_if_we_provide_only_email_input()
	{
		$response = $this->post(route('register.store'), [
			'email' => 'gela@redberry.ge',
		]);

		$response->assertSessionHasErrors(
			[
				'username',
				'password',
				'repeat',
			]
		);
		$response->assertSessionDoesntHaveErrors(['email']);
	}

//	public function test_after_successful_registration_user_should_be_added_to_database()
//	{
//		$user = [
//			'username'                  => 'babakaka',
//			'email'                     => 'testemail@test.com',
//			'password'                  => 'passwordtest',
//			'repeat'                    => 'passwordtest',
//		];
//
//		$this->post(route('register.store'), $user);
//
//		$this->assertDatabaseHas('users', $user);
//	}
}
