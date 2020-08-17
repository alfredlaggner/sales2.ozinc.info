<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau385Sid0004B39A5GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_385_sid_0004B39A_5_Group', function(Blueprint $table)
		{
			$table->string('Name (group)')->nullable()->index('_tidx_#Tableau_385_sid_0004B39A_5_Group_1a');
			$table->string('name')->nullable()->index('_tidx_#Tableau_385_sid_0004B39A_5_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_385_sid_0004B39A_5_Group');
	}

}
