<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_post';

    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'deleted_at'
    ];
}
