<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryType extends Model
{
    use HasFactory;
    protected $table = 'product_category_type';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'pct_name',
    ];

    public function productCategoryType()
    {
        return $this->belongsTo(ProductCategoryType::class, 'pct_id', 'id');
    }
}
