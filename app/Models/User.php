<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Role;
use App\Models\Antrian;
use App\Models\Kulit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    use HasApiTokens;

    protected $table = 'tb_user';

    protected $fillable = [
        'name',
        'image',
        'email',
        'password',
        'jenis_kelamin',
        'id_kulit',
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

    public function kulit()
    {
        return $this->belongsTo(Kulit::class, 'id_kulit', 'id');
    }
    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function antrian()
    {
        return $this->hasOne(Antrian::class);
    }

}