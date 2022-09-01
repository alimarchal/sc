<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevCollNSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rev_coll_n_s', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('aor')->nullable();
            $table->string('type_of_card')->nullable();
            $table->string('value_of_card')->nullable();
            $table->decimal('card_sold_unit_outlets', 14, 2)->nullable();
            $table->decimal('card_sold_franchisee', 14, 2)->nullable();
            $table->decimal('card_sold_total', 14, 2)->nullable();
            $table->decimal('rebate_percentage', 14, 2)->nullable();
            $table->decimal('rebate_amount_in_rs', 14, 2)->nullable();
            $table->decimal('adv_tax_percentage', 14, 2)->nullable();
            $table->decimal('adv_tax_amount_in_rs', 14, 2)->nullable();
            $table->decimal('bal_amount_rs_unit_outlets', 14, 2)->nullable();
            $table->decimal('bal_amount_franchisee', 14, 2)->nullable();
            $table->decimal('bal_amount_total', 14, 2)->nullable();
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
        Schema::dropIfExists('rev_coll_n_s');
    }
}
