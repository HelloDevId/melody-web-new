<?php

namespace App\Models;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_product';

    protected $fillable = [
        'name',
        'image',
        'price',
        'description',
        'id_kategori',
        'jumlah_terjual',
        'deleted_at',

    ];

    public function Kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
}
