<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau74Sid00004ECC6GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_74_sid_00004ECC_6_Group', function(Blueprint $table)
		{
			$table->string('Salesperson Id (group)', 19)->nullable()->index('_tidx_#Tableau_74_sid_00004ECC_6_Group_1a');
			$table->integer('salesperson_id')->nullable()->index('_tidx_#Tableau_74_sid_00004ECC_6_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_74_sid_00004ECC_6_Group');
	}

}
