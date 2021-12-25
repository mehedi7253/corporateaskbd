<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'teams';
    protected $fillable = [
        'first_name','last_name','designation','image','status'
    ];
}
