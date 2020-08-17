<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsBackupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments_backup', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('ext_id')->nullable();
			$table->string('sales_order')->nullable();
			$table->integer('year_paid')->nullable();
			$table->integer('month_paid')->nullable();
			$table->integer('year_invoiced')->nullable();
			$table->integer('month_invoiced')->nullable();
			$table->float('comm_percent', 10, 4)->nullable();
			$table->float('commission', 10)->nullable();
			$table->char('name')->nullable();
			$table->char('display_name')->nullable();
			$table->char('move_name')->nullable();
			$table->date('invoice_date')->nullable();
			$table->date('payment_date')->nullable();
			$table->char('payment_type')->nullable();
			$table->char('state')->nullable();
			$table->float('amount', 10)->nullable();
			$table->float('amount_untaxed', 10)->nullable();
			$table->float('amount_taxed', 10)->nullable();
			$table->float('payment_difference', 10)->nullable();
			$table->float('tax', 10)->nullable()->default(0.00);
			$table->boolean('multi')->nullable();
			$table->boolean('has_invoices')->nullable();
			$table->integer('invoice_ids')->nullable();
			$table->string('sales_person_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->string('customer_name')->nullable();
			$table->string('customer_type')->nullable();
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
		Schema::drop('payments_backup');
	}

}
