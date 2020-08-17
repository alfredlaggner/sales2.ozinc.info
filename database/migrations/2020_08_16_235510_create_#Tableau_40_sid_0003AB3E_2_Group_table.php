<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau40Sid0003AB3E2GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_40_sid_0003AB3E_2_Group', function(Blueprint $table)
		{
			$table->string('Name (group)')->nullable()->index('_tidx_#Tableau_40_sid_0003AB3E_2_Group_1a');
			$table->string('name')->nullable()->index('_tidx_#Tableau_40_sid_0003AB3E_2_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_40_sid_0003AB3E_2_Group');
	}

}
