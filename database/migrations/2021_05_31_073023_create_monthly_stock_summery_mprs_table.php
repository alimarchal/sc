<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyStockSummeryMprsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_stock_summery_mprs', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('btn')->nullable();
            $table->string('type_of_cards')->nullable();
            $table->string('denom')->nullable();
            $table->string('previous_balance_424_csc')->nullable();
            $table->string('previous_balance_428_csc')->nullable();
            $table->string('previous_balance_432_csc')->nullable();
            $table->string('received_during_month_424_csc')->nullable();
            $table->string('received_during_month_428_csc')->nullable();
            $table->string('received_during_month_432_csc')->nullable();
            $table->string('sold_unit_outlets_424_csc')->nullable();
            $table->string('sold_unit_outlets_428_csc')->nullable();
            $table->string('sold_unit_outlets_432_csc')->nullable();
            $table->string('sold_franchisee_jarral_mpr')->nullable();
            $table->string('sold_franchisee_kti')->nullable();
            $table->string('sold_franchisee_fahad_bhr')->nullable();
            $table->string('sold_franchisee_baig_krt')->nullable();
            $table->string('sold_franchisee_dadyal')->nullable();
            $table->string('bal_in_stores_424_csc')->nullable();
            $table->string('bal_in_stores_428_csc')->nullable();
            $table->string('bal_in_stores_432_csc')->nullable();
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
        Schema::dropIfExists('monthly_stock_summery_mprs');
    }
}
