<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('infos', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('country');
			$table->string('code');
			$table->foreignId('country_id')->constrained()->cascadeOnDelete();
			$table->bigInteger('confirmed');
			$table->bigInteger('recovered');
			$table->bigInteger('critical');
			$table->bigInteger('deaths');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('infos');
	}
};
