<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'stock',
        'code',
        'description',
        'price',
        'status',
    ];

    public function cart(){
        return $this->hasMany(Cart::class);
    }
}
