<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau23Sid0002D9B45GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_23_sid_0002D9B4_5_Group', function(Blueprint $table)
		{
			$table->string('BrandName (group)')->nullable()->index('_tidx_#Tableau_23_sid_0002D9B4_5_Group_1a');
			$table->string('Calculation_1111474335096385538')->nullable()->index('_tidx_#Tableau_23_sid_0002D9B4_5_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_23_sid_0002D9B4_5_Group');
	}

}
