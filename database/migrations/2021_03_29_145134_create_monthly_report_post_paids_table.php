<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyReportPostPaidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_report_post_paids', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('btn_name')->nullable();
            $table->string('district')->nullable();
            $table->string('client_name')->nullable();
            $table->string('no_of_connections')->nullable();
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
        Schema::dropIfExists('monthly_report_post_paids');
    }
}
