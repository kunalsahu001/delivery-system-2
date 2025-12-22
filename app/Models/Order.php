<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['order_code', 'priority', 'duration', 'status'];

    public function assignment()
    {
        return $this->hasOne(Assignment::class);
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }
}
