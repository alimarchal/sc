<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporateCustomerDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_customer_data', function (Blueprint $table) {
            $table->id();
            $table->string('btn_name')->nullable();
            $table->string('district')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('revenue')->nullable();
            $table->string('package_offered')->nullable();
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
        Schema::dropIfExists('corporate_customer_data');
    }
}
