<?php

namespace Tests\Feature;

use App\Models\ResetPassword;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserModelTest extends TestCase
{
	use RefreshDatabase;

	public function test_user_has_one_reset_password_class()
	{
		$user = User::factory()->create();
		$reset = ResetPassword::factory()->create(['user_id' => $user->id]);

		$this->assertInstanceOf(HasOne::class, $user->resetPassword());
	}
}
