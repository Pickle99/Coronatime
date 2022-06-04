<?php

namespace Tests\Feature;

use App\Models\ResetPassword;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResetPasswordModelTest extends TestCase
{
	use RefreshDatabase;

	public function test_reset_password_belongs_to_user_class()
	{
		$user = User::factory()->create();
		$reset = ResetPassword::factory()->create(['user_id' => $user->id]);

		$this->assertInstanceOf(BelongsTo::class, $reset->user());
	}
}
