<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $casts = [
    'images' => 'array',
    ];

    public function discount(){
        return $this->hasOne(Discount::class,'product_id','id');
    }
}
