<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFranchiseWiseRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('franchise_wise_revenues', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_franchise')->nullable();
            $table->string('aor_district')->nullable();
            $table->string('asg')->nullable();
            $table->string('ach')->nullable();
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
        Schema::dropIfExists('franchise_wise_revenues');
    }
}
