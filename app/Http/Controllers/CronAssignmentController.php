<?php

namespace App\Http\Controllers;

use App\Services\OrderAssignmentService;

class CronAssignmentController extends Controller
{
    protected $service;

    public function __construct(OrderAssignmentService $service)
    {
        $this->service = $service;
    }

    public function assignOrders()
    {
        $this->service->autoAssignOrders();

        return response()->json([
            'status' => 'success',
            'message' => 'Orders assigned successfully'
        ]);
    }
}
