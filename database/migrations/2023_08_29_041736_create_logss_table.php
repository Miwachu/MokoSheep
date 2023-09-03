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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('weather',250);
            $table->string('situation',1000);
            $table->string('image_url');
            $table->string('evidence_of_emotion',1000);
            $table->string('counter_evidence_of_emotion',1000);
            $table->string('flexible_thought',1000);
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
    
    
};


