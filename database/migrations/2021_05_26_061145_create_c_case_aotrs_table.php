<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCCaseAotrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_case_aotrs', function (Blueprint $table) {
            $table->id();

            $table->date('date')->nullable();
            $table->string('aor')->nullable();
            $table->string('case_suited')->nullable();
            $table->string('settled')->nullable();
            $table->decimal('bal', 14, 2)->nullable();
            $table->decimal('defaulted_amount', 14, 2)->nullable();
            $table->decimal('recovered_amount', 14, 2)->nullable();
            $table->decimal('amount_balance', 14, 2)->nullable();
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
        Schema::dropIfExists('c_case_aotrs');
    }
}
