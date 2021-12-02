<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categorys';
    protected $fillable =[
        'name',
        'image'
    ];

    public function item(){
        return $this->hasMany(Item::class , 'cat_id' , 'id');
    }
}
