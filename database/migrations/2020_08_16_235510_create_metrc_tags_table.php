<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMetrcTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('metrc_tags', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('tag')->nullable();
			$table->string('type')->nullable();
			$table->string('status')->nullable();
			$table->boolean('is_used')->default(0);
			$table->dateTime('used_at')->nullable();
			$table->date('commissioned');
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
		Schema::drop('metrc_tags');
	}

}
