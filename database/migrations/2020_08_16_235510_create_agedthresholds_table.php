<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgedthresholdsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agedthresholds', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('age')->nullable();
			$table->string('action')->nullable();
			$table->integer('repeats')->nullable();
			$table->integer('repeats_done')->nullable();
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
		Schema::drop('agedthresholds');
	}

}
