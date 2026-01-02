<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {

            // Primary key
            $table->id();

            // Unique order identifier
            $table->string('order_code')->unique();

            // Order status lifecycle
            $table->enum('status', ['pending', 'assigned', 'delivered'])
                  ->default('pending');

            // Created & updated timestamps
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Drop table if migration is rolled back
        Schema::dropIfExists('orders');
    }
};
