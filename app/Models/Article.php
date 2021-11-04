<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = [
        'id',
        'title',
        'body',
        'picture_path',
        'author',
        'created_at',
        'updated_at'
    ];
    
    use HasFactory;
}
