<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau58Sid00017E007GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_58_sid_00017E00_7_Group', function(Blueprint $table)
		{
			$table->text('PCODE (group)', 65535)->nullable()->index('_tidx_#Tableau_58_sid_00017E00_7_Group_1a');
			$table->text('Calculation_6603403005630324745', 65535)->nullable()->index('_tidx_#Tableau_58_sid_00017E00_7_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_58_sid_00017E00_7_Group');
	}

}
