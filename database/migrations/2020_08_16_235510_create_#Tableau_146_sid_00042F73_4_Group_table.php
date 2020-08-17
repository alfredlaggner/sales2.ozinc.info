<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau146Sid00042F734GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_146_sid_00042F73_4_Group', function(Blueprint $table)
		{
			$table->string('_REPS (group)')->nullable()->index('_tidx_#Tableau_146_sid_00042F73_4_Group_1a');
			$table->string('Calculation_3929953637797257234')->nullable()->index('_tidx_#Tableau_146_sid_00042F73_4_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_146_sid_00042F73_4_Group');
	}

}
