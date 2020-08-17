<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau11Sid00042F6D4GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_11_sid_00042F6D_4_Group', function(Blueprint $table)
		{
			$table->string('RepID-SalesOrders (group)', 11)->nullable()->index('_tidx_#Tableau_11_sid_00042F6D_4_Group_1a');
			$table->string('salesperson_id', 11)->nullable()->index('_tidx_#Tableau_11_sid_00042F6D_4_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_11_sid_00042F6D_4_Group');
	}

}
