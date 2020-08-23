<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeBonusesAddCalendarId extends Migration
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
            $table->integer('1099_calendar_id')->unsigned()->nullable();
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
            $table->dropColumn('1099_calendar_id');
        });
    }
}
