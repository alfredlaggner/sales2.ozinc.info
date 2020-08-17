<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau120743Sid0001C2282GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_120743_sid_0001C228_2_Group', function(Blueprint $table)
		{
			$table->string('Salesperson Id (group)', 19)->nullable()->index('_tidx_#Tableau_120743_sid_0001C228_2_Group_1a');
			$table->integer('salesperson_id')->nullable()->index('_tidx_#Tableau_120743_sid_0001C228_2_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_120743_sid_0001C228_2_Group');
	}

}
