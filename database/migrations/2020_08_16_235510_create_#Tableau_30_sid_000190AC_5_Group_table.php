<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau30Sid000190AC5GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_30_sid_000190AC_5_Group', function(Blueprint $table)
		{
			$table->text('SubcatCalc (group) (copy)', 65535)->nullable();
			$table->text('Calculation_6603403005633830922', 65535)->nullable()->index('_tidx_#Tableau_30_sid_000190AC_5_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_30_sid_000190AC_5_Group');
	}

}
