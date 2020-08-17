<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau84Sid0005A1D93ConnectCheckCreateTempTableCapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_84_sid_0005A1D9_3_Connect_CheckCreateTempTableCap', function(Blueprint $table)
		{
			$table->integer('COL')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_84_sid_0005A1D9_3_Connect_CheckCreateTempTableCap');
	}

}
