<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;
    protected $fillable = ['province_id', 'gst_rate', 'pst_rate', 'hst_rate'];
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
