<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTmpOdooLotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tmp_odoo_lots', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('lot_name')->nullable();
			$table->string('sku')->nullable();
			$table->integer('product_id')->nullable();
			$table->string('product_name')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tmp_odoo_lots');
	}

}
