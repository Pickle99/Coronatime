<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
	/*
	 * A basic feature test example.
	 *
	 * @return void
	 */
	use RefreshDatabase;

	public function test_login_page_is_accessible()
	{
		$response = $this->get('/login');
		$response->assertSuccessful();
		$response->assertViewIs('components.user.login');
	}

	public function test_auth_should_give_us_errors_if_input_is_not_provided()
	{
		$response = $this->post('/login');
		$response->assertSessionHasErrors(
			[
				'user',
				'password',
			]
		);
	}

	public function test_auth_should_give_us_user_error_if_we_wont_provide_user_input()
	{
		$response = $this->post('/login', [
			'password' => 'my-so-secret-password',
		]);

		$response->assertSessionHasErrors(
			[
				'user',
			]
		);
		$response->assertSessionDoesntHaveErrors(['password']);
	}

	public function test_auth_should_give_us_password_error_if_we_wont_provide_password_input()
	{
		$response = $this->post('/login', [
			'user' => 'gela@redberry.ge',
		]);

		$response->assertSessionHasErrors(
			[
				'password',
			]
		);
		$response->assertSessionDoesntHaveErrors(['user']);
	}

	public function test_auth_should_give_us_incorrect_credentials_error_when_such_user_does_not_exists()
	{
		$response = $this->post('/login', [
			'user'     => 'giuna@redberry.ge',
			'password' => 'password',
		]);

		$response->assertSessionHasErrors([
			'user' => 'Your provided credentials could not be verified',
		]);
	}

	public function test_auth_should_redirect_to_dashboard_page_after_successful_login()
	{
		$email = 'admin@gmail.com';
		$password = '11111';

		User::factory()->create(
			[
				'email'             => $email,
				'password'          => bcrypt($password),
			]
		);

		$response = $this->post('/login', [
			'user'         => $email,
			'password'     => $password,
		]);

		$response->assertRedirect('/dashboard');
	}
}
