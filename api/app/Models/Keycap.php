<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keycap extends Model
{
    use HasFactory;
    protected $table = 'keycaps';
    public $primaryKey = 'product_id';
    protected $fillable = ['profile', 'material'];

    // one keycap is one product
    public function product()
    {
    return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
