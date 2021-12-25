<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicMessage extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'public_messages';
    protected $fillable = [
        'name','email','phone','message'
    ];

}
