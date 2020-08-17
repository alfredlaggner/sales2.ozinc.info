<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau67Sid000480A16GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_67_sid_000480A1_6_Group', function(Blueprint $table)
		{
			$table->string('RepID-SalesOrders (group)', 11)->nullable()->index('_tidx_#Tableau_67_sid_000480A1_6_Group_1a');
			$table->string('salesperson_id', 11)->nullable()->index('_tidx_#Tableau_67_sid_000480A1_6_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_67_sid_000480A1_6_Group');
	}

}
