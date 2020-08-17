<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau80Sid00004EF55GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_80_sid_00004EF5_5_Group', function(Blueprint $table)
		{
			$table->string('Name (group)')->nullable()->index('_tidx_#Tableau_80_sid_00004EF5_5_Group_1a');
			$table->string('name')->nullable()->index('_tidx_#Tableau_80_sid_00004EF5_5_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_80_sid_00004EF5_5_Group');
	}

}
