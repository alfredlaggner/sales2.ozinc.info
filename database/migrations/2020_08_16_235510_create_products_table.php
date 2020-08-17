<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ext_id')->unsigned()->nullable();
			$table->integer('metrc_id')->nullable();
			$table->string('code')->nullable();
			$table->string('barcode')->nullable()->default('\'\'');
			$table->string('name')->nullable();
			$table->integer('brand_id')->nullable();
			$table->string('brand')->nullable()->default('NULL');
			$table->integer('category_id')->nullable();
			$table->string('category')->nullable();
			$table->string('sub_category')->nullable();
			$table->string('category_full')->nullable();
			$table->boolean('is_active')->nullable()->default(0);
			$table->integer('quantity')->nullable();
			$table->float('cost', 10)->nullable();
			$table->float('revenue', 10)->nullable();
			$table->float('margin', 10)->nullable();
			$table->float('commission_percent', 15)->nullable();
			$table->integer('units_sold')->nullable();
			$table->boolean('sale_ok')->nullable()->default(0);
			$table->boolean('purchase_ok')->default(0);
			$table->integer('units_forcasted')->nullable();
			$table->integer('incoming_qty')->nullable();
			$table->integer('available_threshold')->nullable();
			$table->float('list_price', 10)->nullable();
			$table->float('weight', 10)->nullable();
			$table->timestamps();
			$table->index(['code','name','brand','category','sub_category','category_full'], 'products');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
