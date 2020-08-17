<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerImportsNoLicenseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_imports_no_license', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('ext_id')->nullable();
			$table->string('license', 50)->nullable();
			$table->string('api_id')->nullable()->index('external_id_2');
			$table->string('reference_id');
			$table->string('name')->nullable();
			$table->string('business_name');
			$table->string('street')->nullable();
			$table->string('street2')->nullable();
			$table->string('city')->nullable();
			$table->string('zip')->nullable();
			$table->string('territory')->nullable();
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->string('license_type')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customer_imports_no_license');
	}

}
