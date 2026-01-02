<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAssignment extends Model
{
    protected $fillable = [
        'order_id',
        'delivery_boy_id',
        'assigned_at',
        'expected_delivery_at',
        'delivered_at'
    ];
}
