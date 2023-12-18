<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'ref_number',
        'result_code',
        'result_message',
        'response_code',
        'auth_code',
        'errors',
        'trans_id',
        'status', // Add the status field
        // Add any other fields you need
    ];
}
