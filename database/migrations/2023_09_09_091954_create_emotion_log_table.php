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
        Schema::create('emotion_log', function (Blueprint $table) {
            $table->foreignId('log_id')->constrained('emotions');   //参照先のテーブル名を
            $table->foreignId('emotion_id')->constrained('logs');    //constrainedに記載
            $table->primary(['emotion_id', 'log_id']);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emotion_log');
    }
};
