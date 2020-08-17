<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMetrcPlannedRoutesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('metrc_planned_routes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('customer_id')->nullable()->unique('customer_id');
			$table->integer('driver_id')->nullable();
			$table->integer('vehicle_id')->nullable();
			$table->text('planned_route', 65535)->nullable();
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
		Schema::drop('metrc_planned_routes');
	}

}
