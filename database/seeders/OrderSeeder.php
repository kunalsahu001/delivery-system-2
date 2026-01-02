<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        // Create dummy orders
        for ($i = 1; $i <= 10; $i++) {
            Order::create([
                'order_code' => 'ORD-' . str_pad($i, 3, '0', STR_PAD_LEFT),
            ]);
        }
    }
}
