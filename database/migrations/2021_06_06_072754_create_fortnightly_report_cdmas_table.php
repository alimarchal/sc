<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFortnightlyReportCdmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fortnightly_report_cdmas', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('aor')->nullable();
            $table->decimal('previous_hh',14,0)->nullable();
            $table->decimal('previous_dt',14,0)->nullable();
            $table->decimal('fortnightly_hh',14,0)->nullable();
            $table->decimal('fortnightly_dt',14,0)->nullable();
            $table->decimal('total_hh',14,0)->nullable();
            $table->decimal('total_dt',14,0)->nullable();
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
        Schema::dropIfExists('fortnightly_report_cdmas');
    }
}
