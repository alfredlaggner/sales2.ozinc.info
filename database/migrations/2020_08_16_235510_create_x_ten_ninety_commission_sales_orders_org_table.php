<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXTenNinetyCommissionSalesOrdersOrgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('x_ten_ninety_commission_sales_orders_org', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('month')->nullable();
			$table->integer('half')->nullable();
			$table->integer('year')->nullable();
			$table->integer('rep_id')->nullable();
			$table->boolean('is_paid')->default(0);
			$table->boolean('is_comm_paid')->default(0);
			$table->date('comm_paid_at')->nullable();
			$table->integer('saved_commissions_id')->nullable();
			$table->integer('sales_order_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->string('sales_order')->nullable();
			$table->date('invoice_date')->nullable();
			$table->boolean('is_ten_ninety')->default(0);
			$table->float('amount_untaxed', 10)->nullable()->default(0.00);
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
		Schema::drop('x_ten_ninety_commission_sales_orders_org');
	}

}
