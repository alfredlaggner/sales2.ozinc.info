<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXTenNinetyCommissionsOrgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('x_ten_ninety_commissions_org', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('month')->nullable();
			$table->integer('half')->nullable();
			$table->integer('year')->nullable();
			$table->integer('rep_id')->nullable();
			$table->boolean('is_ten_ninety')->default(0);
			$table->float('goal', 10)->nullable()->default(0.00);
			$table->float('volume', 10)->nullable()->default(0.00);
			$table->float('volume_collected', 10)->nullable()->default(0.00);
			$table->float('percent', 10)->nullable()->default(0.00);
			$table->float('commission', 12, 4)->nullable()->default(0.0000);
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
		Schema::drop('x_ten_ninety_commissions_org');
	}

}
