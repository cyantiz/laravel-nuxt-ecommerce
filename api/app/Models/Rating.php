<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    public $primaryKey = 'rating_id';
    protected $fillable = ['customer_id', 'product_id', 'star', 'comment'];
}
