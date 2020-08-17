<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMetrcPackagesOldTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('metrc_packages_old', function(Blueprint $table)
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
			$table->string('uom')->nullable();
			$table->string('lab_testing')->nullable();
			$table->date('date')->nullable();
			$table->timestamps();
			$table->index(['tag','product_name','ref','item','category','item_strain','uom','lab_testing'], 'metrc_packages');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('metrc_packages_old');
	}

}
