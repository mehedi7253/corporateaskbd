<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvide extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'service_provides';
    protected $fillable = [
      'pdf_version', 'doc_version', 'bd_jobs_link', 'linkdin_jobs_link', 'portfolio_link'
    ];
}

