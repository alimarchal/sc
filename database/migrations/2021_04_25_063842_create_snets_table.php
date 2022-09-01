<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snets', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('btn')->nullable();
            $table->string('company')->nullable();
            $table->string('dsl_site')->nullable();
            $table->integer('capacity')->nullable();
            $table->integer('vacant')->nullable();
            $table->integer('active_subscriber')->nullable();
            $table->integer('cir_customers')->nullable();
            $table->integer('other_customers')->nullable();
            $table->integer('official_customers')->nullable();
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
        Schema::dropIfExists('snets');
    }
}
