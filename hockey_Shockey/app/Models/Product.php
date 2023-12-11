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
        'product_category_type_id'
    ];

    public function productCategoryType()
    {
        return $this->belongsTo(ProductCategoryType::class, 'product_category_type_id', 'id');
    }
}
