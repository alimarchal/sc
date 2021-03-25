<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlySaleProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_sale_progress', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('btn')->nullable();
            $table->string('services')->nullable();
            $table->string('denom')->nullable();
            $table->string('card_sale_through_own_outlets_423_csc')->nullable();
            $table->string('card_sale_through_own_outlets_426_csc')->nullable();
            $table->string('card_sale_through_own_outlets_429_csc')->nullable();
            $table->decimal('own_outlet_total_cards',2)->nullable();
            $table->decimal('own_outlet_total_revenue',2)->nullable();
            $table->string('card_sale_through_franchise_neelum_comm_mzd')->nullable();
            $table->string('card_sale_through_franchise_ahmed_trader_bagh')->nullable();
            $table->string('card_sale_through_franchise_rkt_comm_gp')->nullable();
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
        Schema::dropIfExists('monthly_sale_progress');
    }
}
