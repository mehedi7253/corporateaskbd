<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'books';
    protected $fillable = [
      'book_name', 'writer_name','publisher_name','country','language','main_image','old_price','discount_price','status', 'url'
    ];

}
