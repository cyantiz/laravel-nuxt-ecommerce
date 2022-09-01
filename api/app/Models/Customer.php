<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // tables name, primary key and fillables from migration: "2022_08_09_142316_create_customers_table.php"
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'email',
        'name',
        'phone',
        'address',
        'province_code',
        'district_code',
        'commune_code'    
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'customer_id');
    }

    // loved many products through customer_loved_product
    public function lovedProducts()
    {
        return $this->belongsToMany(Product::class, 'customer_loved_product', 'product_id', 'customer_id');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'customer_id', 'customer_id');
    } 
}
