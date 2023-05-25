<?php

namespace App\Models;

use App\Models\Antrian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Konsultasi extends Model
{
    use HasFactory;
    protected $table = 'tb_konsultasi';

    protected $fillable = [
        'id_antrian',
        'hasil_konsultasi',
    ];


    public function antrian()
    {
        return $this->belongsTo(Antrian::class, 'id_antrian', 'id');
    }

}