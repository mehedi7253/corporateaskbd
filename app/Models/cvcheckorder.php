<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cvcheckorder extends Model
{
    use HasFactory;
    protected $table = 'cvcheckorders';
    public $timestamps = true;

    protected $fillable = [
        'order_id', 'status', 'file_name','serial', 'link_url'
    ];
}
