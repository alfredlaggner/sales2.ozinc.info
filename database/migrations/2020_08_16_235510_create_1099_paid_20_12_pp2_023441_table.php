<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Create1099Paid2012Pp2023441Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('1099_paid_20_12_pp2_023441', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('month')->nullable();
			$table->integer('half')->nullable();
			$table->integer('year')->nullable();
			$table->date('payment_date')->nullable();
			$table->integer('rep_id')->nullable();
			$table->string('rep')->nullable();
			$table->boolean('is_comm_paid')->default(0);
			$table->date('comm_paid_at')->nullable();
			$table->integer('saved_commissions_id')->nullable();
			$table->integer('sales_order_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->string('customer_name')->nullable();
			$table->string('sales_order')->nullable();
			$table->integer('invoice_id')->nullable();
			$table->date('invoice_date')->nullable();
			$table->boolean('is_ten_ninety')->default(0);
			$table->float('amount', 10)->nullable();
			$table->float('amount_untaxed', 10)->nullable()->default(0.00);
			$table->float('amount_due', 10)->nullable();
			$table->float('commission', 10)->nullable();
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
		Schema::drop('1099_paid_20_12_pp2_023441');
	}

}
