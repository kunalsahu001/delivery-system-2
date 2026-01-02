<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('delivery_boys', function (Blueprint $table) {

            // Primary key
            $table->id();

            // Delivery boy name (A, B, C, D)
            $table->string('name', 50);

            // Maximum number of orders allowed at one time
            $table->integer('max_quantity');

            // Laravel default timestamps
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Drop table on rollback
        Schema::dropIfExists('delivery_boys');
    }
};
