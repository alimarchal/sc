<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlySaleProgressMprsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_sale_progress_mprs', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('btn')->nullable();
            $table->string('services')->nullable();
            $table->string('denom')->nullable();
            $table->string('card_sale_through_own_outlets_424_csc')->nullable();
            $table->string('card_sale_through_own_outlets_428_csc')->nullable();
            $table->string('card_sale_through_own_outlets_432_csc')->nullable();
            $table->string('sales_card')->nullable();
            $table->string('own_outlet_total_cards')->nullable();
            $table->string('own_outlet_total_revenue')->nullable();
            $table->string('card_sale_through_franchise_jarral_mpr')->nullable();
            $table->string('card_sale_through_franchise_kti')->nullable();
            $table->string('card_sale_through_franchise_fahad_bhr')->nullable();
            $table->string('card_sale_through_franchise_baig_krt')->nullable();
            $table->string('card_sale_through_franchise_dadyal')->nullable();
            $table->string('franchisee_total_cards')->nullable();
            $table->string('franchisee_total_revenue')->nullable();
            $table->string('own_outlet_franchisee_total_cards')->nullable();
            $table->string('own_outlet_franchisee_total_revenue')->nullable();
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
        Schema::dropIfExists('monthly_sale_progress_mprs');
    }
}
