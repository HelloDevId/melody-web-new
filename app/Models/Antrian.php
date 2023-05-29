<?php

namespace App\Models;

use App\Models\User;
use App\Models\Keluhan;
use App\Models\Konsultasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Antrian extends Model
{
    use HasFactory;
    protected $table = 'tb_antrian';

    protected $fillable = [
        'id_user',
        'no_antrian',
        'tanggal',
        'status',
        'id_keluhan',
        'detail_keluhan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function keluhan()
    {
        return $this->belongsTo(Keluhan::class, 'id_keluhan', 'id');
    }

    public function konsultasi()
    {
        return $this->hasOne(Konsultasi::class);
    }

}