<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class item_images extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'item_id',
    ];

    public function Item(){
        return $this->belongsTo(Item::class , 'item_id' , 'id');
    }
}
