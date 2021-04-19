<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnetSphonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snet_sphones', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('btn')->nullable();
            $table->string('company')->nullable();
            $table->string('type')->nullable();
            $table->string('district')->nullable();
            $table->string('location_site')->nullable();
            $table->string('capacity')->nullable();
            $table->string('working_slots')->nullable();
            $table->string('vacant_slots')->nullable();
            $table->decimal('revenue')->nullable();
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
        Schema::dropIfExists('snet_sphones');
    }
}
