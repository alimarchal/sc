<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourtCaseAotrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('court_case_aotrs', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('region')->nullable();
            $table->string('district')->nullable();
            $table->string('particulars')->nullable();
            $table->string('case_pending_no')->nullable();
            $table->decimal('case_pending_amount',14,3)->nullable();
            $table->string('case_civs_suit_filed_no')->nullable();
            $table->decimal('case_civs_suit_filed_amount',14,3)->nullable();
            $table->string('case_pending_with_dues_no')->nullable();
            $table->decimal('case_pending_with_dues_amount',14,3)->nullable();
            $table->string('cases_req_written_off_no')->nullable();
            $table->decimal('cases_req_written_off_amount',14,3)->nullable();
            $table->string('case_pending_no_1')->nullable();
            $table->decimal('case_pending_amount_1',14,3)->nullable();
            $table->string('total_no')->nullable();
            $table->decimal('total_amount',14,3)->nullable();
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
        Schema::dropIfExists('court_case_aotrs');
    }
}
