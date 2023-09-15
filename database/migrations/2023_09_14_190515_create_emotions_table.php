<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emotions', function (Blueprint $table) {
            $table->id();
            $table->boolean('A');
            $table->integer('percentage_of_A');
            $table->boolean('B');
            $table->integer('percentage_of_B');
            $table->boolean('C');
            $table->integer('percentage_of_C');
            $table->boolean('D');
            $table->integer('percentage_of_D');
            $table->boolean('E');
            $table->integer('percentage_of_E');
            $table->boolean('F');
            $table->integer('percentage_of_F');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emotions');
    }
};
