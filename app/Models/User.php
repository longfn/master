<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function usersRoles()
    {
        return $this->hasMany(UsersRole::class);
    }

    public function taggables()
    {
        return $this->hasMany(Taggable::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
