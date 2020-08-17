<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeeBonusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employee_bonuses', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('sales_person_name')->nullable();
			$table->integer('sales_person_id')->nullable();
			$table->integer('month')->nullable();
			$table->integer('year')->nullable();
			$table->decimal('base_bonus', 10, 6)->nullable();
			$table->decimal('bonus', 10, 6)->nullable()->default(0.000000);
			$table->date('comm_paid_at')->nullable();
			$table->string('comm_paid_by');
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
		Schema::drop('employee_bonuses');
	}

}
