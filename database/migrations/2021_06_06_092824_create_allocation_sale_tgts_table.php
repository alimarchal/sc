<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllocationSaleTgtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocation_sale_tgts', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('btn')->nullable();

            $table->decimal('will_cards_tgt_neelum', 14,2)->nullable();
            $table->decimal('will_connection_achived_neelum', 14,2)->nullable();

            $table->decimal('will_cards_tgt_atb', 14,2)->nullable();
            $table->decimal('will_connection_achived_atb', 14,2)->nullable();

            $table->decimal('will_cards_tgt_rcgp', 14,2)->nullable();
            $table->decimal('will_connection_rcgp', 14,2)->nullable();

            $table->decimal('will_cards_tgt_total', 14,2)->nullable();
            $table->decimal('will_connection_rcgp_total', 14,2)->nullable();

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
        Schema::dropIfExists('allocation_sale_tgts');
    }
}
