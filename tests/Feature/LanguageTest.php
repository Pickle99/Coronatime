<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LanguageTest extends TestCase
{
	use RefreshDatabase;

	public function test_language_can_change_to_english()
	{
		$response = $this->get('language/en');

		$response->assertSessionHas('locale', 'en');
	}

	public function test_language_can_change_to_georgian()
	{
		$response = $this->get('language/ka');

		$response->assertSessionHas('locale', 'ka');
	}
}
