<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Offer extends Model
{
    use HasFactory;
    protected $fillable =[
        'offer_percent',
        'new_price',
        'item_id',
        'date_expired'
    ];

    public function item(){
        return $this->belongsTo(Item::class , 'offer' , 'id');
    }
}
