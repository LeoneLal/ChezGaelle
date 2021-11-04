<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'pictures';
    protected $fillable = [
        'id',
        'name',
        'picture_path',
        'description'
    ];

    use HasFactory;
}
