<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Order;
use App\Models\DeliveryPersonnel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AssignmentController extends Controller
{
    // Display all assignments
    public function index()
    {
        // Load assignments with order and personnel details, latest first
        $assignments = Assignment::with(['order', 'personnel'])->orderByDesc('id')->get();
        return view('admin.assignments.index', compact('assignments'));
    }

    // Assign an order to eligible delivery personnel
    public function assignOrder(Order $order)
    {
        // Check if order is already assigned or delivered
        if ($order->status != 'pending') {
            return back()->with('error', 'Order already assigned or delivered');
        }

        // Find eligible personnel based on current workload and priority
        $eligible = DeliveryPersonnel::whereColumn('current_orders', '<', 'max_orders')->get()
            ->filter(function ($person) use ($order) {
                $priority = strtolower($order->priority);

                if ($priority === 'urgent') {
                    return $person->skill_level === 'expert';
                }

                if ($priority === 'standard') {
                    return in_array($person->skill_level, ['intermediate', 'expert']);
                }

                // Low priority: any personnel
                return true;
            });

        // If no personnel available, return error
        if ($eligible->isEmpty()) {
            return back()->with('error', 'No available personnel for this order');
        }

        // Select personnel with least workload, optionally round-robin with last assigned time
        $assignedPersonnel = $eligible->sortBy('current_orders')->sortBy('last_assigned_at')->first();

        // Create assignment record
        $assignment = Assignment::create([
            'order_id' => $order->id,
            'delivery_personnel_id' => $assignedPersonnel->id,
            'assigned_at' => now(), // Assigned time
        ]);

        // Update personnel workload and last assigned timestamp
        $assignedPersonnel->increment('current_orders');
        $assignedPersonnel->update(['last_assigned_at' => now()]);

        // Auto-attach order document if it exists
        if ($order->document_path) {
            $assignment->document_path = $order->document_path;
            $assignment->save();
        }

        // Update order status to assigned
        $order->update(['status' => 'assigned']);

        return back()->with('success', "Order {$order->order_code} assigned to {$assignedPersonnel->name}");
    }

    // Mark assignment as delivered
    public function markDelivered(Assignment $assignment)
    {
        // Set delivered timestamp
        $assignment->update(['delivered_at' => Carbon::now()]);

        // Reduce personnel workload
        $assignment->personnel->decrement('current_orders');

        // Update order status
        $assignment->order->update(['status' => 'delivered']);

        return back()->with('success', "Order {$assignment->order->order_code} marked as delivered");
    }
}
