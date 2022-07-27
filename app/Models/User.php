<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use SoftDeletes;
    use AuthenticableTrait;
    use Notifiable;

    public const TYPE = [
        'admin' => 1,
        'student' => 2,
    ];

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'address',
        'school_id',
        'type',
        'parent_id',
        'verified_at',
        'closed',
        'code',
        'social_type',
        'social_id',
        'social_name',
        'social_nickname',
        'social_avatar',
        'description',
    ];

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

    public function isAdmin()
    {
        return $this->type == self::TYPE['admin'];
    }

    public function isStudent()
    {
        return $this->type == self::TYPE['student'];
    }

    public function hasVerifiedEmail()
    {
        return ! is_null($this->verified_at);
    }

    public function markEmailAsVerified()
    {
        return $this->forceFill([
            'verified_at' => $this->freshTimestamp(),
        ])->save();
    }
}
