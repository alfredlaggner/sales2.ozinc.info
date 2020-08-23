<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TenninetysalesorderAddAmountTaxed extends Migration
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
            $table->double('amount_taxed', 10,2)->nullable();
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
            $table->dropColumn('amount_taxed');
        });
    }
}
