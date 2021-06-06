<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFortnightlyReportSphonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fortnightly_report_sphones', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('aor')->nullable();
            $table->decimal('cap',14,0)->nullable();
            $table->decimal('working_connection',14,0)->nullable();
            $table->decimal('ntc',14,0)->nullable();
            $table->decimal('pmc',14,0)->nullable();
            $table->decimal('ntcs',14,0)->nullable();
            $table->decimal('pmc_restored',14,0)->nullable();
            $table->decimal('total',14,0)->nullable();
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
        Schema::dropIfExists('fortnightly_report_sphones');
    }
}
