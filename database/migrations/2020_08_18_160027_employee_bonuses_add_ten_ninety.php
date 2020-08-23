<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeBonusesAddTenNinety extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_bonuses', function(Blueprint $table)
        {
            $table->integer('is_ten_ninety')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_bonuses', function(Blueprint $table)
        {
            $table->dropColumn('is_ten_ninety');
        });
    }
}
