<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serviceCategory extends Model
{
    use HasFactory;
    protected $table = 'service_categories';
    public $timestamps = true;
   
    protected $fillable = [
        'name'
    ];
}
