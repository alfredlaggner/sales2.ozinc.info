<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau19Sid000390801GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_19_sid_00039080_1_Group', function(Blueprint $table)
		{
			$table->string('Salesperson Id (group)', 19)->nullable()->index('_tidx_#Tableau_19_sid_00039080_1_Group_1a');
			$table->integer('salesperson_id')->nullable()->index('_tidx_#Tableau_19_sid_00039080_1_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_19_sid_00039080_1_Group');
	}

}
