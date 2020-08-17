<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau20371Sid0003DCE11GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_20371_sid_0003DCE1_1_Group', function(Blueprint $table)
		{
			$table->string('Sales Person (group)')->nullable()->index('_tidx_#Tableau_20371_sid_0003DCE1_1_Group_1a');
			$table->string('sales_person')->nullable()->index('_tidx_#Tableau_20371_sid_0003DCE1_1_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_20371_sid_0003DCE1_1_Group');
	}

}
