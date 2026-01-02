<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function getPendingOrders()
    {
        return Order::where('status', 'pending')
            ->orderBy('id')
            ->get();
    }

    public function markAssigned($orderId)
    {
        Order::where('id', $orderId)
            ->update(['status' => 'assigned']);
    }
}
