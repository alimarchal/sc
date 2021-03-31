<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_states', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('btn_name')->nullable();
            $table->string('site_name')->nullable();
            $table->string('total_monthly_revenue')->nullable();
            $table->string('total_number_of_hour_site_switched_off')->nullable();
            $table->date('month')->nullable();
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
        Schema::dropIfExists('site_states');
    }
}
