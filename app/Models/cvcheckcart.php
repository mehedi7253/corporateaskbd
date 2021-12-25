<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cvcheckcart extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'cvcheckcarts';
    protected $fillable = [
       'service_id', 'invoice_number', 'price', 'status'
    ];
}
