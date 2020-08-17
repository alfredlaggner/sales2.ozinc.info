<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau385Sid0004B39A4GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_385_sid_0004B39A_4_Group', function(Blueprint $table)
		{
			$table->string('RepID-SalesOrders (group)', 11)->nullable()->index('_tidx_#Tableau_385_sid_0004B39A_4_Group_1a');
			$table->string('salesperson_id', 11)->nullable()->index('_tidx_#Tableau_385_sid_0004B39A_4_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_385_sid_0004B39A_4_Group');
	}

}
