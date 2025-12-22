<?php

namespace App\Http\Controllers;

use App\Models\DeliveryPersonnel;
use Illuminate\Http\Request;

class DeliveryPersonnelController extends Controller
{
    public function index()
    {
        $personnel = DeliveryPersonnel::orderBy('id','DESC')->get();
        return view('admin.delivery_personnel.index', compact('personnel'));
    }
}
