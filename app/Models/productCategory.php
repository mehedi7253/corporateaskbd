<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productCategory extends Model
{
    use HasFactory;
    protected $table = 'product_categories';
    public $timestamps = true;
   
    protected $fillable = [
        'name'
    ];

    public function products(){
        return $this->hasMany(product::class, 'id');
    }
}
