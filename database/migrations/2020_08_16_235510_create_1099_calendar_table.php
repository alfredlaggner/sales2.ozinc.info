<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create1099CalendarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('1099_calendar', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->date('start')->nullable();
			$table->date('end')->nullable();
			$table->date('pay_date')->nullable();
			$table->integer('month')->nullable();
			$table->integer('half')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('1099_calendar');
	}

}
