<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau60157Sid000143B96GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_60157_sid_000143B9_6_Group', function(Blueprint $table)
		{
			$table->string('Name (group)')->nullable()->index('_tidx_#Tableau_60157_sid_000143B9_6_Group_1a');
			$table->string('name')->nullable()->index('_tidx_#Tableau_60157_sid_000143B9_6_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_60157_sid_000143B9_6_Group');
	}

}
