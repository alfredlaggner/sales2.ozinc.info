<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau60160Sid000143BC1GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_60160_sid_000143BC_1_Group', function(Blueprint $table)
		{
			$table->string('Name (group)')->nullable()->index('_tidx_#Tableau_60160_sid_000143BC_1_Group_1a');
			$table->string('name')->nullable()->index('_tidx_#Tableau_60160_sid_000143BC_1_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_60160_sid_000143BC_1_Group');
	}

}
