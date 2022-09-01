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
            $table->string('aor')->nullable();
            $table->decimal('scom_asg',14,3)->nullable();
            $table->decimal('scom_ach',14,3)->nullable();
            $table->decimal('snet_asg',14,3)->nullable();
            $table->decimal('snet_ach',14,3)->nullable();
            $table->decimal('sphone_asg',14,3)->nullable();
            $table->decimal('sphone_ach',14,3)->nullable();
            $table->decimal('dxx_asg',14,3)->nullable();
            $table->decimal('dxx_ach',14,3)->nullable();
            $table->decimal('total_asg',14,3)->nullable();
            $table->decimal('total_ach',14,3)->nullable();
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
