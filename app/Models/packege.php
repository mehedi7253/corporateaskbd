<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class packege extends Model
{
    use HasFactory;
    protected $table = 'packeges';
    public $timestamps = true;
   
    protected $fillable = [
        'slug', 'name', 'price', 'default_discount', 'status', 'thumbnail'
    ];

    public function products()
    {
        return $this->belongsTo(product::class, 'id');
    }
    
}
