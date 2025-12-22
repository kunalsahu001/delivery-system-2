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
        Schema::create('delivery_personnel', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('skill_level', ['beginner', 'intermediate', 'expert']);
            $table->integer('max_orders');
            $table->integer('current_orders')->default(0);
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
        Schema::dropIfExists('delivery_personnel');
    }
};
