<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevenueTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revenue_targets', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('btn')->nullable();
            $table->string('company')->nullable();
            $table->string('district')->nullable();
            $table->decimal('fourg_asg')->nullable();
            $table->decimal('fourg_ach')->nullable();
            $table->decimal('snet_asg')->nullable();
            $table->decimal('snet_ach')->nullable();
            $table->decimal('sphone_asg')->nullable();
            $table->decimal('sphone_ach')->nullable();
            $table->decimal('dxx_asg')->nullable();
            $table->decimal('dxx_ach')->nullable();
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
        Schema::dropIfExists('revenue_targets');
    }
}
