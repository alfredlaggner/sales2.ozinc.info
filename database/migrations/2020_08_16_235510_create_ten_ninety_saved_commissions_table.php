<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTenNinetySavedCommissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ten_ninety_saved_commissions', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->char('description')->nullable();
			$table->char('name')->nullable();
			$table->dateTime('date_created')->nullable();
			$table->text('comment', 65535)->nullable();
			$table->char('created_by')->nullable();
			$table->integer('month')->nullable();
			$table->integer('half')->nullable();
			$table->integer('year')->nullable();
			$table->date('start')->nullable();
			$table->date('end')->nullable();
			$table->boolean('is_commissions_paid')->default(0);
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
		Schema::drop('ten_ninety_saved_commissions');
	}

}
