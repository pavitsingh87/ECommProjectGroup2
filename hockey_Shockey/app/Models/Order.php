<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    //protected $fillable = ['user_id', 'total', 'province_id'];
         
    protected $fillable = [
        'email',
        'delivery_method',
        'country',
        'first_name',
        'last_name',
        'address',
        'city',
        'state',
        'zip_code',
        'user_id','payment_status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
