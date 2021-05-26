<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoRevenueCollectionAotrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sco_revenue_collection_aotrs', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('aor')->nullable();
            $table->string('detail')->nullable();
            $table->decimal('amount_trf_sco_main_acc', 14, 2)->nullable();
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
        Schema::dropIfExists('sco_revenue_collection_aotrs');
    }
}
