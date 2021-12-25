<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'offers';
    protected $fillable = [
        'service_id','discount','status','image','url'
    ];

    public function services(){
       return $this->belongsTo(service::class, 'id');
    }
}
