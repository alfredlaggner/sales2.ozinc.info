<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMarginsWorkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('margins_work', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ext_id')->unsigned()->nullable();
			$table->string('code')->nullable();
			$table->string('name')->nullable();
			$table->integer('brand_id')->nullable();
			$table->string('brand')->nullable()->default('NULL');
			$table->integer('category_id')->nullable();
			$table->string('category')->nullable();
			$table->string('sub_category')->nullable();
			$table->string('category_full')->nullable();
			$table->boolean('is_active')->nullable()->default(0);
			$table->float('cost', 10)->nullable();
			$table->float('revenue', 10)->nullable();
			$table->float('margin', 10)->nullable();
			$table->float('commission_percent', 15)->nullable();
			$table->integer('units_sold')->nullable();
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
		Schema::drop('margins_work');
	}

}
