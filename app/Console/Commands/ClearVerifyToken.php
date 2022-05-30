<?php

namespace App\Console\Commands;

use App\Models\VerifyUser;
use Illuminate\Console\Command;

class ClearVerifyToken extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'verify:token-clear';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'clear verification tokens for verified users';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		VerifyUser::where('user_id', '>', 0)->delete();
		$this->info('Verified users token successfully deleted from database');
	}
}
