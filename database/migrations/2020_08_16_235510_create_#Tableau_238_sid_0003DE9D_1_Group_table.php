<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau238Sid0003DE9D1GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_238_sid_0003DE9D_1_Group', function(Blueprint $table)
		{
			$table->string('Salesperson Id (group)', 11)->nullable()->index('_tidx_#Tableau_238_sid_0003DE9D_1_Group_1a');
			$table->integer('salesperson_id')->nullable()->index('_tidx_#Tableau_238_sid_0003DE9D_1_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_238_sid_0003DE9D_1_Group');
	}

}
