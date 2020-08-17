<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau140Sid0003D84A2GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_140_sid_0003D84A_2_Group', function(Blueprint $table)
		{
			$table->string('Sales Person (group)')->nullable()->index('_tidx_#Tableau_140_sid_0003D84A_2_Group_1a');
			$table->string('sales_person')->nullable()->index('_tidx_#Tableau_140_sid_0003D84A_2_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_140_sid_0003D84A_2_Group');
	}

}
