<?php

namespace App\Models;
use App\Models\Role;
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
        'id_role',
        'deleted_at'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id');
    }


}
