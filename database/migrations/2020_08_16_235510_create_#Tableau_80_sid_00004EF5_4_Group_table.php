<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau80Sid00004EF54GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_80_sid_00004EF5_4_Group', function(Blueprint $table)
		{
			$table->string('Salesperson Id (group)', 19)->nullable()->index('_tidx_#Tableau_80_sid_00004EF5_4_Group_1a');
			$table->integer('salesperson_id')->nullable()->index('_tidx_#Tableau_80_sid_00004EF5_4_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_80_sid_00004EF5_4_Group');
	}

}
