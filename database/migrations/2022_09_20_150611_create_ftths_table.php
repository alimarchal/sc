<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFtthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ftths', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('btn')->nullable();
            $table->string('company')->nullable();
            $table->decimal('total_accts',14,2)->nullable();
            $table->decimal('new_accs',14,2)->nullable();
            $table->decimal('pmc',14,2)->nullable();
            $table->decimal('restored_after_pmc',14,2)->nullable();
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
        Schema::dropIfExists('ftths');
    }
}
