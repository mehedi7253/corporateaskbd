<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ordersfinal extends Model
{
    use HasFactory;
    protected $table = 'ordersfinals';
    public $timestamps = true;

    protected $fillable = [
        'transaction_id', 'user_id', 'experience', 'purchase_type', 'meta', 'price', 'status'
    ];

}
