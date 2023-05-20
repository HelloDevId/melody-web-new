<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'tb_role';

    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
