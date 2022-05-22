<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class ClearUnverifiedUsers extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'unverified:clear';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Clear unverified users';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		User::where('email_verified_at', '=', null)->delete();
		$this->info('Unverified users successfully deleted from database');
	}
}
