<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeliveryBoy;

class DeliveryBoySeeder extends Seeder
{
    public function run(): void
    {
        // Predefined delivery personnel data
        DeliveryBoy::insert([
            ['name' => 'A', 'max_quantity' => 2],
            ['name' => 'B', 'max_quantity' => 4],
            ['name' => 'C', 'max_quantity' => 5],
            ['name' => 'D', 'max_quantity' => 3],
        ]);
    }
}
