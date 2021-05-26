<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyDslRevAotrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_dsl_rev_aotrs', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('aor')->nullable();
            $table->string('company')->nullable();
            $table->string('new_dsl_connections')->nullable();
            $table->string('total_working_connection')->nullable();
            $table->decimal('modem_charges', 14, 2)->nullable();
            $table->decimal('svc_charges', 14, 2)->nullable();
            $table->decimal('total', 14, 2)->nullable();
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
        Schema::dropIfExists('monthly_dsl_rev_aotrs');
    }
}
