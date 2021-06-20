<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyProgressSpcSphonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_progress_spc_sphones', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('aor')->nullable();
            $table->string('telephone_no')->nullable();
            $table->string('name_and_address')->nullable();
            $table->decimal('security_fee',14,2)->nullable();
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
        Schema::dropIfExists('weekly_progress_spc_sphones');
    }
}
