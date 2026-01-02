<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use App\Repositories\DeliveryBoyRepository;
use App\Repositories\AssignmentRepository;
use Carbon\Carbon;

class OrderAssignmentService
{
    protected $orderRepo;
    protected $boyRepo;
    protected $assignmentRepo;

    public function __construct(
        OrderRepository $orderRepo,
        DeliveryBoyRepository $boyRepo,
        AssignmentRepository $assignmentRepo
    ) {
        $this->orderRepo = $orderRepo;
        $this->boyRepo = $boyRepo;
        $this->assignmentRepo = $assignmentRepo;
    }

    public function autoAssignOrders()
    {
        $orders = $this->orderRepo->getPendingOrders();
        $boys   = $this->boyRepo->getAll();

        foreach ($orders as $order) {
            foreach ($boys as $boy) {

                if (!$this->boyRepo->canAssignMore($boy->id)) {
                    continue;
                }

                if ($this->boyRepo->hasActiveDelivery($boy->id)) {
                    continue;
                }

                $assignedAt = Carbon::now();
                $expectedAt = $assignedAt->copy()->addMinutes(30);

                $this->assignmentRepo->createAssignment(
                    $order->id,
                    $boy->id,
                    $assignedAt,
                    $expectedAt
                );

                $this->orderRepo->markAssigned($order->id);

                break;
            }
        }
    }
}
