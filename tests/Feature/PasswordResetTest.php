<?php

namespace Tests\Feature;

use App\Models\ResetPassword;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
	use RefreshDatabase;

	public function test_reset_password_belongs_to_user_class()
	{
		$user = User::factory()->create();
		$reset = ResetPassword::factory()->create(['user_id' => $user->id]);

		$this->assertInstanceOf(BelongsTo::class, $reset->user());
	}

	public function test_forgot_password_page_is_accessible()
	{
		$response = $this->get(route('password.view'));
		$response->assertSuccessful();
		$response->assertViewIs('components.user.forgot-password');
	}

	public function test_email_should_give_us_errors_if_input_is_not_provided()
	{
		$response = $this->post(route('password.email'));
		$response->assertSessionHasErrors(
			[
				'email',
			]
		);
	}

	public function test_email_should_give_us_errors_if_email_doesnt_exist()
	{
		User::factory()->create();
		$response = $this->post(route('password.email'), ['email' => 'chemikJ8@gmail.com']);
		$response->assertSessionHasErrors(
			[
				'email',
			]
		);
	}

	public function test_when_email_input_is_correct_it_should_redirect_to_password_sent_page()
	{
		$user = User::factory()->create(['email' => 'babakaka@gmail.com']);

		$response = $this->post(route('password.email'), [
			'email' => $user->email,
		]);
		$resetPassword = ResetPassword::where('email', '=', $user->email)->first();
		$response->assertRedirect(route('password.sent', ['token' => $resetPassword->token]));
	}

	public function test_reset_password_page_is_accessible()
	{
		$user = User::factory()->create(['email' => 'mama@gmail.com']);

		$this->post(route('password.email'), [
			'email' => $user->email,
		]);

		$resetPassword = ResetPassword::where('email', '=', $user->email)->first();

		$response = $this->get(route('password.reset', ['token' => $resetPassword->token, 'email' => $resetPassword->email]));
		$response->assertSuccessful();
		$response->assertViewIs('components.user.reset-password');
	}

	public function test_reset_password_should_give_us_validation_errors_if_we_wont_provide_inputs()
	{
		$user = User::factory()->create(['email' => 'mama@gmail.com']);

		$this->post(route('password.email'), [
			'email' => $user->email,
		]);
		$resetPassword = ResetPassword::where('email', '=', $user->email)->first();
		$this->get(route('password.reset', ['token' => $resetPassword->token, 'email' => $resetPassword->email]));

		$response = $this->post(route('password.update', ['token' => $resetPassword->token]), ['token' => $resetPassword->token, 'email' => $resetPassword->email]);
		$response->assertSessionHasErrors(
			[
				'password',
			]
		);
		$response->assertSessionDoesntHaveErrors(['token', 'email']);
	}

	public function test_user_can_update_password()
	{
		$user = User::factory()->create(['email' => 'mama@gmail.com']);

		$this->post(route('password.email'), [
			'email' => $user->email,
		]);
		$resetPassword = ResetPassword::where('email', '=', $user->email)->first();
		$this->get(route('password.reset', ['token' => $resetPassword->token, 'email' => $resetPassword->email]));

		$response = $this->post(route('password.update', ['token' => $resetPassword->token]), ['token' => $resetPassword->token, 'email' => $resetPassword->email, 'password' => '12345', 'password_confirmation' => '12345']);

		$response->assertRedirect(route('reset.success'));
	}
}
