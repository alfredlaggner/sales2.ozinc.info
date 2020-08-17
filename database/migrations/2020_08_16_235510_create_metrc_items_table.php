<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMetrcItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('metrc_items', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('metrc_id')->unique('metrc_id');
			$table->integer('product_id')->nullable();
			$table->string('name')->nullable()->index('metrc_items');
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
		Schema::drop('metrc_items');
	}

}
