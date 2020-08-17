<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau22Sid000048EC1GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_22_sid_000048EC_1_Group', function(Blueprint $table)
		{
			$table->string('Name (group)')->nullable()->index('_tidx_#Tableau_22_sid_000048EC_1_Group_1a');
			$table->string('name')->nullable()->index('_tidx_#Tableau_22_sid_000048EC_1_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_22_sid_000048EC_1_Group');
	}

}
