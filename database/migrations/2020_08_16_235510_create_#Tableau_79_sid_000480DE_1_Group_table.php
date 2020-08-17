<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau79Sid000480DE1GroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_79_sid_000480DE_1_Group', function(Blueprint $table)
		{
			$table->string('RepID-SalesOrders (group)', 11)->nullable()->index('_tidx_#Tableau_79_sid_000480DE_1_Group_1a');
			$table->string('salesperson_id', 11)->nullable()->index('_tidx_#Tableau_79_sid_000480DE_1_Group_2a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_79_sid_000480DE_1_Group');
	}

}
