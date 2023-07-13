<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'logo',
        'price',
        'seller_id',
        'store_id',
    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function store() {
        return $this->belongsTo(Store::class);
    }
}
