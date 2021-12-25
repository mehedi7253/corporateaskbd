<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book_orders extends Model
{  
    use HasFactory;
    public $timestamps = true;
    protected $table = 'book_orders';
    protected $fillable = [
        'user_id','book_id','invoice_number','quantity'
    ];


}
