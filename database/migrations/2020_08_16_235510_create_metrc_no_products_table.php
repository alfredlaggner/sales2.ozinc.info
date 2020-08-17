<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMetrcNoProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('metrc_no_products', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('product_name');
			$table->string('product_new_name');
			$table->boolean('is_create')->default(0);
			$table->boolean('is_sellable')->default(0);
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
		Schema::drop('metrc_no_products');
	}

}
