<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerImportsGoodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_imports_good', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('license', 19)->nullable();
			$table->integer('ext_id')->nullable();
			$table->string('api_id', 10)->nullable();
			$table->string('reference_id', 11)->nullable();
			$table->string('name', 84)->nullable();
			$table->string('business_name', 60)->nullable();
			$table->string('street', 32)->nullable();
			$table->string('street2', 14)->nullable();
			$table->string('city', 19)->nullable();
			$table->integer('zip')->nullable();
			$table->string('territory', 17)->nullable();
			$table->string('email', 108)->nullable();
			$table->string('phone', 10)->nullable();
			$table->string('license_type', 13)->nullable();
			$table->string('T-FINAL_REP', 8)->nullable();
			$table->string('user_id', 3)->nullable();
			$table->string('expiraton', 10)->nullable();
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
		Schema::drop('customer_imports_good');
	}

}
