<?php

namespace App\Models;

use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'store_id',

    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }


    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);

}}
