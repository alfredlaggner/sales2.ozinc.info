<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau102Sid00042F368GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_102_sid_00042F36_8_Group', function(Blueprint $table)
		{
			$table->text('SubcatCalc (group)', 65535)->nullable()->index('_tidx_#Tableau_102_sid_00042F36_8_Group_1a');
			$table->text('Calculation_6603403005633830922', 65535)->nullable()->index('_tidx_#Tableau_102_sid_00042F36_8_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_102_sid_00042F36_8_Group');
	}

}
