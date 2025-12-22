<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Assignment;
use App\Models\DeliveryPersonnel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display all orders
    public function index()
    {
        // Load orders with their assigned personnel, latest first
        $orders = Order::with('assignment.personnel')->orderByDesc('id')->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Show form to create a new order
    public function create()
    {
        return view('admin.orders.create');
    }

    // Store new order and auto-assign
    public function store(Request $request)
    {
        // Validate order input
        $validated = $request->validate([
            'order_code' => 'required|unique:orders,order_code',
            'priority'   => 'required|in:urgent,standard,low',
            'duration'   => 'required|in:15,30,60',
        ]);

        // Step 1: Create the order
        $order = Order::create([
            'order_code' => $validated['order_code'],
            'priority'   => $validated['priority'],
            'duration'   => $validated['duration'],
            'status'     => 'pending',
        ]);

        // Step 2: Automatically assign order to eligible personnel
        $this->autoAssignOrder($order);

        return redirect()
            ->route('orders.index')
            ->with('success', 'Order created & auto-assigned successfully');
    }

    // Auto-assign order to delivery personnel based on priority & workload
    private function autoAssignOrder(Order $order)
    {
        // Step 1: Find eligible personnel
        $eligible = DeliveryPersonnel::whereColumn('current_orders', '<', 'max_orders')
            ->get()
            ->filter(function ($p) use ($order) {
                if ($order->priority === 'urgent') {
                    return $p->skill_level === 'expert';
                }

                if ($order->priority === 'standard') {
                    return in_array($p->skill_level, ['intermediate', 'expert']);
                }

                return true; // low priority: anyone
            });

        if ($eligible->isEmpty()) {
            // No personnel available, leave order unassigned
            return;
        }

        // Step 2: Pick personnel with least current orders
        $personnel = $eligible->sortBy('current_orders')->first();

        // Step 3: Assigned time in Kolkata timezone
        $assignedAt = Carbon::now('Asia/Kolkata');

        // Step 4: Calculate expected delivery time using duration
        $expectedDelivery = $assignedAt->copy()->addMinutes($order->duration);

        // Step 5: Create assignment record
        $assignment = Assignment::create([
            'order_id'              => $order->id,
            'delivery_personnel_id' => $personnel->id,
            'assigned_at'           => $assignedAt,
            'expected_delivery_at'  => $expectedDelivery,
        ]);

        // Step 6: Increment personnel workload
        $personnel->increment('current_orders');

        // Step 7: Update order status
        $order->update(['status' => 'assigned']);

        // Step 8: Attach document if exists
        if ($order->document_path) {
            $assignment->document_path = $order->document_path;
            $assignment->save();
        }
    }
}
