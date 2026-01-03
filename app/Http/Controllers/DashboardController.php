<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = 0;
        $urgentOrders = 0;
        $assignedOrders = 0;
        $availablePersonnel = 0;

        return view('admin.dashboard', compact(
            'totalOrders',
            'urgentOrders',
            'assignedOrders',
            'availablePersonnel'
        ));
    }
}
