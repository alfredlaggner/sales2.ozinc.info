<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMetrcUomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('metrc_uoms', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('QuantityType')->nullable();
			$table->string('Name')->nullable();
			$table->string('Abbreviation')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('metrc_uoms');
	}

}
