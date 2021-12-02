<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\User;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'user_id',
        'price',
        'amount'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class , 'item_id' , 'id' );
    }

    public function user()
    {
        return $this->hasMany(User::class , 'id' , 'user_id');
    }

}
