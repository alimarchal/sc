<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimsSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sims_sales', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('type')->nullable();
            $table->string('btn_name')->nullable();
            $table->string('name')->nullable();
            $table->string('re_verified_sims')->nullable();
            $table->string('duplicate_sims')->nullable();
            $table->string('new_sims')->nullable();
            $table->string('total')->nullable();
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
        Schema::dropIfExists('sims_sales');
    }
}
