<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'delivery_personnel_id', 'assigned_at', 'delivered_at','expected_delivery_at'];
    protected $casts = [
        'assigned_at' => 'datetime',
        'delivered_at' => 'datetime',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function personnel()
    {
        return $this->belongsTo(DeliveryPersonnel::class, 'delivery_personnel_id');
    }
}
