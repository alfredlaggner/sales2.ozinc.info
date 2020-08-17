<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestLinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('test_lines', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('invoice_number', 10)->nullable();
			$table->integer('order_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->integer('product_id')->nullable();
			$table->float('product_margin', 10)->nullable();
			$table->integer('ext_id')->nullable()->index('ext_id');
			$table->date('order_date')->nullable();
			$table->string('ext_id_shipping', 50)->nullable();
			$table->char('code', 10)->nullable()->default('NULL');
			$table->text('name', 65535)->nullable();
			$table->integer('quantity')->nullable();
			$table->string('ext_id_unit', 50)->nullable();
			$table->float('cost', 10)->nullable();
			$table->float('unit_price')->nullable();
			$table->float('margin')->nullable();
			$table->timestamps();
			$table->integer('sales_person_id')->nullable();
			$table->integer('quantity_corrected')->nullable();
			$table->text('note', 65535)->nullable();
			$table->string('line_note_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('test_lines');
	}

}
