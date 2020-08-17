<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau30Sid0000839F1GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_30_sid_0000839F_1_Group', function(Blueprint $table)
		{
			$table->text('ReCombine (group)', 65535)->nullable()->index('_tidx_#Tableau_30_sid_0000839F_1_Group_1a');
			$table->text('Calculation_6603403005621641224', 65535)->nullable()->index('_tidx_#Tableau_30_sid_0000839F_1_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_30_sid_0000839F_1_Group');
	}

}
