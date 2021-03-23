<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumerComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumer_complaints', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('btn_name')->nullable();
            $table->string('fault')->nullable();
            $table->string('proven_svcs')->nullable();
            $table->string('qos')->nullable();
            $table->string('matter_related')->nullable();
            $table->string('misuse')->nullable();
            $table->string('value_added')->nullable();
            $table->string('non_proven')->nullable();
            $table->string('refund')->nullable();
            $table->string('verification')->nullable();
            $table->string('misleading')->nullable();
            $table->string('poor_customer')->nullable();
            $table->string('misc')->nullable();
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
        Schema::dropIfExists('consumer_complaints');
    }
}
