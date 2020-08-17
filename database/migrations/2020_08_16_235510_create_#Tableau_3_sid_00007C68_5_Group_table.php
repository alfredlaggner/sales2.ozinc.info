<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau3Sid00007C685GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_3_sid_00007C68_5_Group', function(Blueprint $table)
		{
			$table->string('Salesperson Id (group)', 19)->nullable()->index('_tidx_#Tableau_3_sid_00007C68_5_Group_1a');
			$table->integer('salesperson_id')->nullable()->index('_tidx_#Tableau_3_sid_00007C68_5_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_3_sid_00007C68_5_Group');
	}

}
