<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Offer;
use App\Models\item_images;
use App\Models\Cart;
use App\Models\OrderItems;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'cat_id',
        'slug',
        'short_description',
        'description',
        'offer',
        'price',
        'offer_id',
    ];

    public $timestamps = TRUE;

    public function Category(){
        return $this->belongsTo(Category::class , 'cat_id' , 'id');
    }

    public function Images(){
        return $this->hasMany(item_images::class , 'item_id' , 'id');
    }

    public function getoffer(){
        return $this->belongsTo(Offer::class , 'offer' , 'id');
    }

    public function Cart()
    {
        return $this->hasMany(Cart::class , 'item_id' , 'id' );
    }

    public function OrderItems(){
        return $this->hasMany(OrderItems::class , 'item_id' , 'id');
    }
}
