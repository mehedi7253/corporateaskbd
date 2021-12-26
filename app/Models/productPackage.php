<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productPackage extends Model
{
    use HasFactory;
    protected $table = 'product_packages';
    public $timestamps = true;
   
    protected $fillable = [
        'package_id', 'product_id', 'is_required'
    ];
}
