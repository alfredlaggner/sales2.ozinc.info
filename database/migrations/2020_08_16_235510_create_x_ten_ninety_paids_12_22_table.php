<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXTenNinetyPaids1222Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('x_ten_ninety_paids_12_22', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ext_id')->nullable()->unique('ext_id');
			$table->integer('saved_commissions_id')->nullable();
			$table->boolean('is_paid')->default(0);
			$table->dateTime('paid_at')->nullable();
			$table->string('paid_by')->nullable();
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
		Schema::drop('x_ten_ninety_paids_12_22');
	}

}
