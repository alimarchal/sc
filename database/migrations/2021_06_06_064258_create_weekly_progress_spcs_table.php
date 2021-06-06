<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyProgressSpcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_progress_spcs', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('aor')->nullable();
            $table->string('sphone_instl_through_spo')->nullable();
            $table->string('instl_during_week')->nullable();
            $table->string('total')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('weekly_progress_spcs');
    }
}
