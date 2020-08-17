<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau34Sid0003AA2D1GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_34_sid_0003AA2D_1_Group', function(Blueprint $table)
		{
			$table->string('BRAND (group)', 19)->nullable()->index('_tidx_#Tableau_34_sid_0003AA2D_1_Group_1a');
			$table->string('Calculation_4137259986913554432', 19)->nullable()->index('_tidx_#Tableau_34_sid_0003AA2D_1_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_34_sid_0003AA2D_1_Group');
	}

}
