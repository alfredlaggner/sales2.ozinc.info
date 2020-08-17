<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau60305Sid000155914GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_60305_sid_00015591_4_Group', function(Blueprint $table)
		{
			$table->string('Name (group)')->nullable()->index('_tidx_#Tableau_60305_sid_00015591_4_Group_1a');
			$table->string('name')->nullable()->index('_tidx_#Tableau_60305_sid_00015591_4_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_60305_sid_00015591_4_Group');
	}

}
