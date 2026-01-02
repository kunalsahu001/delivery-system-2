<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('order_assignments', function (Blueprint $table) {

            // Primary key
            $table->id();

            // Linked order
            $table->foreignId('order_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Assigned delivery boy
            $table->foreignId('delivery_boy_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Assignment start time
            $table->dateTime('assigned_at');

            // Expected delivery completion time
            $table->dateTime('expected_delivery_at');

            // Actual delivery completion time
            $table->dateTime('delivered_at')->nullable();

            // Default timestamps
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Remove assignment table on rollback
        Schema::dropIfExists('order_assignments');
    }
};
