<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function rolesPermissions()
    {
        return $this->hasMany(RolesPermission::class);
    }

    public function usersRoles()
    {
        return $this->hasMany(UsersRole::class);
    }
}
