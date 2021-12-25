<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'courses';
    protected $fillable = [
        'category_id', 'video_link'
    ];

    public function categories(){
        return $this->belongsTo(category::class);
    }
}
