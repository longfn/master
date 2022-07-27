<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Model implements Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    use AuthenticableTrait;

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function tags()
    {
        return $this->morphedToMany(Tag::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
