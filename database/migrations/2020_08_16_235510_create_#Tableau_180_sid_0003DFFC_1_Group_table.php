<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau180Sid0003DFFC1GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_180_sid_0003DFFC_1_Group', function(Blueprint $table)
		{
			$table->string('Salesperson Id (group)', 11)->nullable()->index('_tidx_#Tableau_180_sid_0003DFFC_1_Group_1a');
			$table->integer('salesperson_id')->nullable()->index('_tidx_#Tableau_180_sid_0003DFFC_1_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_180_sid_0003DFFC_1_Group');
	}

}
