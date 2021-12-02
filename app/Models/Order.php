<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderItems;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // public $timestamps = true;

    protected $fillable =[
        'fname',
        'lname',
        'email',
        'addres',
        'phone',
        'city',
        'accepted',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function order_items(){
        return $this->hasMany(OrderItems::class , 'order_id' , 'id');
    }
}
