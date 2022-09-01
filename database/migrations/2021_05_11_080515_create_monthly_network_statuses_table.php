<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyNetworkStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_network_statuses', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('btn', 191)->nullable();
            $table->string('company', 191)->nullable();
            $table->string('sphone_total_exc', 191)->nullable();
            $table->string('sphone_wc', 191)->nullable();
            $table->string('sphone_pmc', 191)->nullable();
            $table->string('sphone_ntc', 191)->nullable();
            $table->string('sphone_fds', 191)->nullable();
            $table->string('gsm_total_bts', 191)->nullable();
            $table->string('gsm_sys_cap', 191)->nullable();
            $table->string('gsm_sim_sold_till_date', 191)->nullable();
            $table->string('gsm_total_subscriber', 191)->nullable();
            $table->string('gsm_active_subscriber', 191)->nullable();
            $table->string('gsm_average_vlr_subs', 191)->nullable();
            $table->string('gsm_sim_sold_during_month', 191)->nullable();
            $table->string('dsl_total_dsl_sites', 191)->nullable();
            $table->string('dsl_cap', 191)->nullable();
            $table->string('dsl_active_subscriber', 191)->nullable();
            $table->string('dsl_provided_during_the_month', 191)->nullable();
            $table->string('dxx_total_dss_sites', 191)->nullable();
            $table->string('dxx_cap', 191)->nullable();
            $table->string('dxx_active_subs', 191)->nullable();
            $table->string('dxx_provided_during_the_month', 191)->nullable();
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
        Schema::dropIfExists('monthly_network_statuses');
    }
}
