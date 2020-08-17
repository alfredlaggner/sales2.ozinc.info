<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTmpBonusTotalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tmp_bonus_totals', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('rep_id')->nullable();
			$table->string('sales_order')->nullable();
			$table->float('amount', 10)->nullable();
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
		Schema::drop('tmp_bonus_totals');
	}

}
