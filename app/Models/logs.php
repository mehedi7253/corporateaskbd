<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'logs';
    protected $fillable = [
        'transaction_id','type','value'
    ];
}
