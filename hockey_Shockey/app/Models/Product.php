<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_name',
        'product_description',
        'product_image',
        'price',
        'availability_status',
        'pct_id',
        'i_id',
    ];
}
