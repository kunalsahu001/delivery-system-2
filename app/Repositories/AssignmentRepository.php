<?php

namespace App\Repositories;

use App\Models\OrderAssignment;

class AssignmentRepository
{
    public function createAssignment($orderId, $boyId, $assignedAt, $expectedAt)
    {
        OrderAssignment::create([
            'order_id'             => $orderId,
            'delivery_boy_id'      => $boyId,
            'assigned_at'          => $assignedAt,
            'expected_delivery_at' => $expectedAt,
        ]);
    }
}
