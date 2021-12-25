<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'blogs';
    protected $fillable = [
      'blog_name','blog_image','description', 'status', 'visitor','type'
    ];

    public function likes(){
        return $this->hasMany(LikeUnlike::class);
    }
}
