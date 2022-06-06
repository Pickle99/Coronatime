<?php

namespace Tests\Feature;

use App\Models\Statistic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatisticTest extends TestCase
{
	use RefreshDatabase;

	public function test_can_search_country_by_english_language()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		Statistic::factory()->create();
		$response = $this->get('/dashboard?page=country&search=georgia');
		$response->assertSee('georgia');
	}

	public function test_can_search_country_by_georgian_language()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		Statistic::factory()->create();
		$response = $this->get('/dashboard?page=country&search=საქართველო');
		$response->assertSee('საქართველო');
	}

	public function test_can_sort_country_by_ascending()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		Statistic::factory()->create();
		Statistic::factory()->create(
			[
				'country' => json_encode([
					'en' => 'Armenia',
					'ka' => 'არმენია',
				]),
				'code' => 'AR',
			]
		);
		$response = $this->get('/dashboard?page=country&sortBy=country&sortDirection=asc');
		$response->assertSeeInOrder(['Armenia', 'Georgia']);
	}

	public function test_can_sort_country_by_descending()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		Statistic::factory()->create();
		Statistic::factory()->create(
			[
				'country' => json_encode([
					'en' => 'Armenia',
					'ka' => 'არმენია',
				]),
				'code' => 'AR',
			]
		);
		$response = $this->get('/dashboard?page=country&sortBy=country&sortDirection=desc');
		$response->assertSeeInOrder(['Georgia', 'Armenia']);
	}

	public function test_can_sort_confirmed_by_ascending()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		Statistic::factory()->create();
		Statistic::factory()->create(
			[
				'country' => json_encode([
					'en' => 'Armenia',
					'ka' => 'არმენია',
				]),
				'code'      => 'AR',
				'confirmed' => 1,
			]
		);
		$response = $this->get('/dashboard?page=country&sortBy=confirmed&sortDirection=asc');
		$response->assertSeeInOrder(['Armenia', 'Georgia']);
	}

	public function test_can_sort_confirmed_by_descending()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		Statistic::factory()->create();
		Statistic::factory()->create(
			[
				'country' => json_encode([
					'en'        => 'Armenia',
					'ka'        => 'არმენია',
					'confirmed' => 1,
				]),
				'code' => 'AR',
			]
		);
		$response = $this->get('/dashboard?page=country&sortBy=confirmed&sortDirection=desc');
		$response->assertSeeInOrder(['Georgia', 'Armenia']);
	}

	public function test_can_sort_deaths_by_ascending()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		Statistic::factory()->create();
		Statistic::factory()->create(
			[
				'country' => json_encode([
					'en'         => 'Armenia',
					'ka'         => 'არმენია',
				]),
				'deaths'     => 1,
				'code'       => 'AR',
			]
		);
		$response = $this->get('/dashboard?page=country&sortBy=deaths&sortDirection=asc');
		$response->assertSeeInOrder(['Armenia', 'Georgia']);
	}

	public function test_can_sort_deaths_by_descending()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		Statistic::factory()->create();
		Statistic::factory()->create(
			[
				'country' => json_encode([
					'en'         => 'Armenia',
					'ka'         => 'არმენია',
				]),
				'deaths'     => 1,
				'code'       => 'AR',
			]
		);
		$response = $this->get('/dashboard?page=country&sortBy=deaths&sortDirection=desc');
		$response->assertSeeInOrder(['Georgia', 'Armenia']);
	}

	public function test_can_sort_recovered_by_ascending()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		Statistic::factory()->create();
		Statistic::factory()->create(
			[
				'country' => json_encode([
					'en'         => 'Armenia',
					'ka'         => 'არმენია',
				]),
				'recovered'     => 1,
				'code'          => 'AR',
			]
		);
		$response = $this->get('/dashboard?page=country&sortBy=recovered&sortDirection=asc');
		$response->assertSeeInOrder(['Armenia', 'Georgia']);
	}

	public function test_can_sort_recovered_by_descending()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		Statistic::factory()->create();
		Statistic::factory()->create(
			[
				'country' => json_encode([
					'en'         => 'Armenia',
					'ka'         => 'არმენია',
				]),
				'recovered'     => 1,
				'code'          => 'AR',
			]
		);
		$response = $this->get('/dashboard?page=country&sortBy=recovered&sortDirection=desc');
		$response->assertSeeInOrder(['Georgia', 'Armenia']);
	}

	public function test_user_can_logout()
	{
		$user = User::factory()->create();
		$this->actingAs($user);
		$this->post('/logout')
			->assertRedirect(route('login.view'));
	}

	public function test_authorized_user_can_access_dashboard_page()
	{
		$user = User::factory()->create();

		$this->actingAs($user);

		$this->get(route('home'))->assertRedirect(route('dashboard'));
	}

	public function test_unauthorized_user_can_not_access_dashboard_page()
	{
		$this->get(route('home'))->assertRedirect(route('login.view'));
	}
}
