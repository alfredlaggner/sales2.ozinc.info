<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau60Sid0003DFF54GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_60_sid_0003DFF5_4_Group', function(Blueprint $table)
		{
			$table->string('Salesperson Id (group)', 11)->nullable()->index('_tidx_#Tableau_60_sid_0003DFF5_4_Group_1a');
			$table->integer('salesperson_id')->nullable()->index('_tidx_#Tableau_60_sid_0003DFF5_4_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_60_sid_0003DFF5_4_Group');
	}

}
