<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $timestamps = true;
   
    protected $fillable = [
        'category_id', 'name', 'price', 'default_discount', 'status'
    ];
}
