<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders_item extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'orders_items';
    protected $fillable = [
        'user_id','category_id','product_id', 'transaction_id', 'purchase_type', 'affiliate_code', 'discount_code'
    ];

}
