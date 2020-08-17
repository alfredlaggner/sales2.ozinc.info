<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau239Sid0003DE9E1GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_239_sid_0003DE9E_1_Group', function(Blueprint $table)
		{
			$table->string('Salesperson Id (group)', 11)->nullable()->index('_tidx_#Tableau_239_sid_0003DE9E_1_Group_1a');
			$table->integer('salesperson_id')->nullable()->index('_tidx_#Tableau_239_sid_0003DE9E_1_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_239_sid_0003DE9E_1_Group');
	}

}
