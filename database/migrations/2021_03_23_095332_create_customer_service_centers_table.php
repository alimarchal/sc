<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerServiceCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_service_centers', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('region')->nullable();
            $table->string('loc_of_csc')->nullable();
            $table->string('svsc')->nullable();
            $table->string('inquiry')->nullable();
            $table->string('complaint')->nullable();
            $table->string('ntc')->nullable();
            $table->string('acct_closure')->nullable();
            $table->string('bill_payment')->nullable();
            $table->string('payment_detail_receipt')->nullable();
            $table->string('duplicate_bill')->nullable();
            $table->string('card_purchases')->nullable();
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
        Schema::dropIfExists('customer_service_centers');
    }
}
