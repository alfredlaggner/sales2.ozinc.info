<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create#Tableau21Sid0000BE4B6FilterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('#Tableau_21_sid_0000BE4B_6_Filter', function(Blueprint $table)
		{
			$table->string('name')->nullable()->index('_tidx_#Tableau_21_sid_0000BE4B_6_Filter_1a');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('#Tableau_21_sid_0000BE4B_6_Filter');
	}

}
