<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopunCode extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'copun_codes';
    protected $fillable = [
        'coupon_code', 'discount', 'status'
    ];
}
