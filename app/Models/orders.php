<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public $timestamps = true;

    protected $fillable = [
        'name', 'email', 'phone', 'amount', 'status', 'transaction_id', 'currency', 'address', 'process_status', 'delivery_date','invoice_number','notify','type', 'delivery','file_name'
    ];

    // public function cvOrder()
    // {
    //     return $this->belongsTo(cvcheckorder::class,'order_id');
    // }
    
}
