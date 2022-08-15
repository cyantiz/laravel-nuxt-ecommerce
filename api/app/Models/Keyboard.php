<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    use HasFactory;
    protected $table = 'keyboards';
    public $primaryKey = 'product_id'; 
    protected $fillable = ['key_layout', 'switch_name', 'keycap', 'hot_swappable', 'connections_type', 'accessories', 'operating_system', 'weight', 'length', 'width', 'depth'];

    // one keyboard is one product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
