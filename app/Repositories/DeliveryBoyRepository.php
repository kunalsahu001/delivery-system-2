<?php

namespace App\Repositories;

use App\Models\DeliveryBoy;
use App\Models\OrderAssignment;
use Carbon\Carbon;

class DeliveryBoyRepository
{
    public function getAll()
    {
        return DeliveryBoy::orderBy('id')->get();
    }

    public function canAssignMore($boyId)
    {
        $active = OrderAssignment::where('delivery_boy_id', $boyId)
            ->whereNull('delivered_at')
            ->count();

        $max = DeliveryBoy::find($boyId)->max_quantity;

        return $active < $max;
    }

    public function hasActiveDelivery($boyId)
    {
        return OrderAssignment::where('delivery_boy_id', $boyId)
            ->whereNull('delivered_at')
            ->where('expected_delivery_at', '>', Carbon::now())
            ->exists();
    }
}
