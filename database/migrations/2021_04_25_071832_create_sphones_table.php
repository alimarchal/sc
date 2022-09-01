<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSphonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sphones', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('btn')->nullable();
            $table->string('company')->nullable();
            $table->string('location')->nullable();
            $table->string('type_of_exchange')->nullable();
            $table->integer('capacity')->nullable();
            $table->integer('wc')->nullable();
            $table->integer('vacant')->nullable();
            $table->integer('pmc')->nullable();
            $table->integer('restored')->nullable();
            $table->integer('ntc')->nullable();
            $table->integer('f_pds')->nullable();
            $table->integer('ldc_pds')->nullable();
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
        Schema::dropIfExists('sphones');
    }
}
