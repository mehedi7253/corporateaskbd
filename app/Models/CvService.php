<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvService extends Model
{
    use HasFactory;
    protected $table = 'cv_services';
    protected $fillable = [
        'name', 'price'
    ];
}
