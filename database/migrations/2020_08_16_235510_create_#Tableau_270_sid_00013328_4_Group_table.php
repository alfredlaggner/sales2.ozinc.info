<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau270Sid000133284GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_270_sid_00013328_4_Group', function(Blueprint $table)
		{
			$table->string('Name (group)')->nullable()->index('_tidx_#Tableau_270_sid_00013328_4_Group_1a');
			$table->string('name')->nullable()->index('_tidx_#Tableau_270_sid_00013328_4_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_270_sid_00013328_4_Group');
	}

}
