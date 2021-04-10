<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourtCaseSecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('court_case_secs', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('region')->nullable();
            $table->string('name_of_tri')->nullable();
            $table->string('district')->nullable();
            $table->string('tehsil')->nullable();
            $table->string('main_ecxh')->nullable();
            $table->string('total_cases_regd_in_aor')->nullable();
            $table->string('outstanding_amount_against_regd_cases')->nullable();
            $table->string('amount_recovered_through_tri')->nullable();
            $table->string('cases_settled')->nullable();
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
        Schema::dropIfExists('court_case_secs');
    }
}
