<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommissionsJanuaryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('commissions_january', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('margin')->nullable();
			$table->float('commission', 10, 4)->nullable();
			$table->string('region', 1)->default('N');
			$table->integer('version')->default(1);
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
		Schema::drop('commissions_january');
	}

}
