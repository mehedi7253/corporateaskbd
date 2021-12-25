<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvCart extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'cv_carts';

    protected $fillable = [
      'service_id', 'cv_service_id', 'invoice_number', 'experience'
    ];
}
