<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MechaSwitch extends Model
{
    use HasFactory;
    protected $table = 'mecha_switches';
    public $primaryKey = 'product_id';
    protected $fillable = ['type', 'operating_force', 'total_travel', 'pre_travel', 'tactile_position', 'tactile_force', 'pre_lubed'];

    // one mecha switch is one product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
    
}
