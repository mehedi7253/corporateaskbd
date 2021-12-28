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

    public function productCategories(){
        return $this->belongsTo(productCategory::class, 'category_id');
    }

    public function productPackages()
    {
        return $this->hasMany(productPackage::class, 'product_id');
    }

    public function productMeta()
    {
        return $this->hasMany(productMeta::class, 'product_id');
    }
}
