<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMetrcPackages1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('metrc_packages1', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ext_id')->nullable()->unique('ext_id');
			$table->string('tag')->nullable()->unique('tag');
			$table->string('product_name')->nullable();
			$table->integer('product_id')->nullable();
			$table->string('ref')->nullable();
			$table->string('item')->nullable();
			$table->string('category')->nullable();
			$table->string('item_strain')->nullable();
			$table->integer('quantity')->nullable();
			$table->string('lab_testing')->nullable();
			$table->date('date')->nullable();
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
		Schema::drop('metrc_packages1');
	}

}
