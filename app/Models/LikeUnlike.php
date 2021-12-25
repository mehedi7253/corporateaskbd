<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeUnlike extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'like_unlikes';
    protected $fillable = [
        'blog_id','user_ip','status'
    ];

    public function blogs(){
        return $this->belongsTo(LikeUnlike::class);
    }
}
