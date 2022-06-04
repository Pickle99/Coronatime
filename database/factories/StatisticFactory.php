<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Statistic>
 */
class StatisticFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'country' => json_encode([
				'en' => 'Georgia',
				'ka' => 'საქართველო',
			]),
			'code'      => 'GE',
			'confirmed' => 1000,
			'recovered' => 900,
			'critical'  => 800,
			'deaths'    => 700,
		];
	}
}
