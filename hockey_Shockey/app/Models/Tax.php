<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'order_id', 'province_id', 'gst_rate', 'pst_rate'];
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
