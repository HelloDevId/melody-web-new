<?php

namespace App\Models;

use App\Models\Antrian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keluhan extends Model
{
    use HasFactory;
    protected $table = 'tb_keluhan';

    protected $fillable = [
        'name',
    ];

    public function antrian()
    {
        return $this->hasOne(Antrian::class);
    }
}