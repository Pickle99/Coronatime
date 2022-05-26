<?php

namespace App\Console\Commands;

use App\Models\ResetPassword;
use Illuminate\Console\Command;

class ClearResetPasswordsToken extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'password:token:clear';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'clear reset passwords token for users';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		ResetPassword::where('user_id', '>', 0)->delete();
		$this->info('Reset passwords token successfully deleted from database');
	}
}
