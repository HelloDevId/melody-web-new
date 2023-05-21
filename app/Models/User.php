<?php

namespace App\Models;
use App\Models\Role;
use App\Models\Post;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'tb_user';

    protected $fillable = [
        'name',
        'image',
        'email',
        'password',
        'jenis_kelamin',
        'jenis_kulit',
        'tanggal_lahir',
        'no_hp',
        'alamat',
        'id_role',
        'deleted_at'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }
    public function post()
    {
        return $this->hasOne(Post::class);
    }

}
