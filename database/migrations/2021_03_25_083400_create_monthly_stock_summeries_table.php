<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyStockSummeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_stock_summeries', function (Blueprint $table) {
            $table->id();
            $table->string('btn')->nullable();
            $table->string('type_of_cards')->nullable();
            $table->string('previous_balance_423_csc')->nullable();
            $table->string('previous_balance_426_csc')->nullable();
            $table->string('previous_balance_429_csc')->nullable();
            $table->string('received_during_month_423_csc')->nullable();
            $table->string('received_during_month_426_csc')->nullable();
            $table->string('received_during_month_429_csc')->nullable();
            $table->string('sold_unit_outlets_423_csc')->nullable();
            $table->string('sold_unit_outlets_426_csc')->nullable();
            $table->string('sold_unit_outlets_429_csc')->nullable();
            $table->string('sold_franchisee_mzd')->nullable();
            $table->string('sold_franchisee_bagh')->nullable();
            $table->string('sold_franchisee_rkt')->nullable();
            $table->string('bal_in_stores_423_csc')->nullable();
            $table->string('bal_in_stores_426_csc')->nullable();
            $table->string('bal_in_stores_429_csc')->nullable();
            $table->string('total')->nullable();
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
        Schema::dropIfExists('monthly_stock_summeries');
    }
}
