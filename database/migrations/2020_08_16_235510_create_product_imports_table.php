<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductImportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_imports', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->char('external_id')->nullable();
			$table->char('category')->nullable();
			$table->char('supplier')->nullable();
			$table->char('internal_reference')->nullable();
			$table->integer('ext_id')->nullable();
			$table->char('product_name')->nullable();
			$table->char('name')->nullable();
			$table->char('species')->nullable();
			$table->integer('unit_size')->nullable();
			$table->char('unit_size_unit')->nullable();
			$table->text('marketing_description', 65535)->nullable();
			$table->char('case_quantity')->nullable();
			$table->char('quantity_on_hand')->nullable();
			$table->char('forcasted')->nullable();
			$table->char('sales_price')->nullable();
			$table->char('cost')->nullable();
			$table->char('sc_topical')->nullable();
			$table->char('sc_plants')->nullable();
			$table->char('sc_suppository')->nullable();
			$table->char('sc_pills')->nullable();
			$table->char('sc_cart')->nullable();
			$table->char('sc_preroll')->nullable();
			$table->char('sc_edible')->nullable();
			$table->char('sc_tincture')->nullable();
			$table->char('sc_dropper')->nullable();
			$table->char('sc_liquids')->nullable();
			$table->char('sc_beverage')->nullable();
			$table->char('sc_flower')->nullable();
			$table->string('sc_misc')->nullable();
			$table->string('sc_concentrate')->nullable();
			$table->string('total_cbd')->nullable();
			$table->string('total_cannabinoids')->nullable();
			$table->string('total_thc')->nullable();
			$table->string('total_terps')->nullable();
			$table->char('batch_id')->nullable();
			$table->char('uid')->nullable();
			$table->boolean('sample')->default(0);
			$table->char('subcat_calc')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_imports');
	}

}
