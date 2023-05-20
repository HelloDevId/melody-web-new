<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tb_kategori';

    protected $fillable = [
        'name',
        'deleted_at'
    ];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
