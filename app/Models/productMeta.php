<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productMeta extends Model
{
    use HasFactory;
    protected $table = 'product_metas';
    public $timestamps = true;
   
    protected $fillable = [
        'product_id', 'type', 'key', 'value'
    ];

    public function products(){
        return $this->hasMany(product::class, 'id');
    }
}
