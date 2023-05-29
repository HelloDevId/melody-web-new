<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kulit extends Model
{
    use HasFactory;
    protected $table = 'tb_kulit';

    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}