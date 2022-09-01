<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; 
    
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = ['name', 'price', 'category', 'brand', 'in_stock', 'description'];

    public function loves()
    {
        return $this->belongsToMany(Customer::class, 'customer_loved_product', 'product_id', 'customer_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'product_id');
    }
    public function thumbnail()
    {
        return $this->hasOne(ProductImage::class, 'product_id', 'product_id')->where('is_thumbnail', 1);
    }
}
