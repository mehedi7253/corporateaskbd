<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    protected $table = 'services';
    public $timestamps = true;
    protected $fillable = [
      'service_name', 'price','description','service_image', 'discount', 'status', 'features', 'benefits', 'url'
    ];

    public function offers(){
      return $this->hasMany(offers::class, 'service_id');
    }

}
