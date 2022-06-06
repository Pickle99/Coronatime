<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class RegisterTest extends TestCase
{
	use RefreshDatabase;

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

	public function test_register_should_give_us_username_email_and_repeat_password_error_if_we_provide_only_password_input()
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

	public function test_register_should_give_us_username_password_and_repeat_password_errors_if_we_provide_only_email_input()
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

	public function test_register_should_give_us_email_password_and_repeat_password_errors_if_we_provide_only_username_input()
	{
		$response = $this->post(route('register.store'), [
			'username' => 'gela',
		]);

		$response->assertSessionHasErrors(
			[
				'email',
				'password',
				'repeat',
			]
		);
		$response->assertSessionDoesntHaveErrors(['username']);
	}

	public function test_user_can_register()
	{
		$user = [
			'username'                  => 'JoeRa',
			'email'                     => 'testemail@test.com',
			'password'                  => 'passwordtest',
			'repeat'                    => 'passwordtest',
		];

		$this->post('/register', $user);

		$this->assertDatabaseHas('users', ['email' => $user['email']]);
	}

	public function test_user_can_verify_email()
	{
		$user = User::factory()->create([
			'email_verified_at' => null,
		]);

		$this->actingAs($user);

		$this->get(route('user.verify', ['token' => $user->token]))->assertRedirect(route('verify.success', ['token' => $user->token]));
	}

	public function test_user_should_redirect_to_login_page_if_user_dont_exist_verified()
	{
		$this->get(route('user.verify', ['token' => Str::random(60)]))->assertRedirect(route('login.view'));
	}

	public function test_user_should_redirect_to_login_page_if_user_already_verified()
	{
		$user = User::factory()->create();
		$this->get(route('user.verify', ['token' => $user->token]))->assertRedirect(route('login.view'));
	}
}
