<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\DeliveryPersonnel;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $urgentOrders = Order::where('priority', 'urgent')->count();
        $assignedOrders = Order::where('status', 'assigned')->count();
        $availablePersonnel = DeliveryPersonnel::whereColumn('current_orders', '<', 'max_orders')->count();

        return view('admin.dashboard', compact(
            'totalOrders',
            'urgentOrders',
            'assignedOrders',
            'availablePersonnel'
        ));
    }
}
