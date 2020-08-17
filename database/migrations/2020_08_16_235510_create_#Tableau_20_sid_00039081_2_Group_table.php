<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau20Sid000390812GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_20_sid_00039081_2_Group', function(Blueprint $table)
		{
			$table->string('Salesperson Id (group)', 19)->nullable()->index('_tidx_#Tableau_20_sid_00039081_2_Group_1a');
			$table->integer('salesperson_id')->nullable()->index('_tidx_#Tableau_20_sid_00039081_2_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_20_sid_00039081_2_Group');
	}

}
