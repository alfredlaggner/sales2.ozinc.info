<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ext_id')->nullable()->index('customer_id');
			$table->string('api_id')->nullable()->index('external_id_2');
			$table->string('ext_id_contact')->nullable()->index();
			$table->string('license', 50)->nullable();
			$table->date('license_expiration')->nullable();
			$table->string('license2')->nullable();
			$table->date('license_expiration2')->nullable();
			$table->boolean('tax_free')->default(0);
			$table->string('name')->nullable();
			$table->string('street')->nullable();
			$table->string('street2')->nullable();
			$table->string('city')->nullable();
			$table->string('zip')->nullable();
			$table->string('website')->nullable();
			$table->float('latitude', 10, 7)->nullable();
			$table->float('longitude', 10, 7)->nullable();
			$table->string('phone', 50)->nullable();
			$table->string('email')->nullable();
			$table->integer('user_id')->nullable();
			$table->string('sales_person')->nullable();
			$table->integer('sale_order_count')->nullable();
			$table->float('total_due', 10)->nullable();
			$table->float('total_overdue', 10)->nullable();
			$table->string('license_type');
			$table->string('territory')->nullable();
			$table->string('reference_id')->nullable();
			$table->string('bcc_business_name')->nullable();
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
		Schema::drop('customers');
	}

}
