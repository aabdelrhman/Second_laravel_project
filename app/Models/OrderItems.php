<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'price',
        'amount',
        'user_id',
    ];

    public function order(){
        return $this->belongsTo(Order::class , 'order_id' , 'id');
    }

    public function items(){
        return $this->belongsTo(Item::class , 'item_id' , 'id');
    }
}
