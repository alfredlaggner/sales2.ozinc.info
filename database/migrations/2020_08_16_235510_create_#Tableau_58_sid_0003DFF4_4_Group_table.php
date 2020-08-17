<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau58Sid0003DFF44GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_58_sid_0003DFF4_4_Group', function(Blueprint $table)
		{
			$table->string('Salesperson Id (group)', 11)->nullable()->index('_tidx_#Tableau_58_sid_0003DFF4_4_Group_1a');
			$table->integer('salesperson_id')->nullable()->index('_tidx_#Tableau_58_sid_0003DFF4_4_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_58_sid_0003DFF4_4_Group');
	}

}
