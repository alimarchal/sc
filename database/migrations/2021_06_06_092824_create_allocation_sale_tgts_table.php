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
            $table->string('name')->nullable();
            $table->string('will_cards_tgt')->nullable();
            $table->string('will_cards_achieved')->nullable();
            $table->string('will_connection_tgt')->nullable();
            $table->string('will_connection_achieved')->nullable();

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
