<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TenninetysalesorderAddDisplayName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ten_ninety_commission_sales_orders', function(Blueprint $table)
        {
            $table->string('display_name', 255)->nullable();
            $table->string('move_name', 255)->nullable();
            $table->double('comm_percent', 10,2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ten_ninety_commission_sales_orders', function(Blueprint $table)
        {
            $table->dropColumn('display_name');
            $table->dropColumn('move_name');
            $table->dropColumn('comm_percent');
        });
    }
}
