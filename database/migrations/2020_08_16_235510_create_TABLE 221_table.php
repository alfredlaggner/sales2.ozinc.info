<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTABLE221Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TABLE 221', function(Blueprint $table)
		{
			$table->string('license')->nullable();
			$table->integer('api_id')->nullable();
			$table->string('reference_id')->nullable();
			$table->string('name', 76)->nullable();
			$table->string('business_name', 99)->nullable();
			$table->string('street', 43)->nullable();
			$table->string('street2')->nullable();
			$table->string('city', 19)->nullable();
			$table->integer('zip')->nullable();
			$table->string('territory', 17)->nullable();
			$table->string('email', 40)->nullable();
			$table->string('phone', 14)->nullable();
			$table->string('license_type', 10)->nullable();
			$table->string('rep', 13)->nullable();
			$table->string('user_id')->nullable();
			$table->date('expiration')->nullable();
			$table->string('website', 40)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('TABLE 221');
	}

}
