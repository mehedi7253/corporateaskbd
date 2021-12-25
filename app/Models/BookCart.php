<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCart extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'book_carts';
    protected $fillable = [
        'user_id','book_id','quantity'
    ];
}
