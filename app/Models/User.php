<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
  const TYPE_ADMIN='admin';
  const TYPE_MANAGER='manager';
  const TYPE_USER='user';
    const TYPES=[self::TYPE_ADMIN,self::TYPE_MANAGER,self::TYPE_USER];
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'password',
        'profile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function is_user()
    {
        return $this->type=self::TYPE_USER;
    }

    public function is_manager()
    {
        return $this->type=self::TYPE_MANAGER;
    }
    public function is_admin()
    {
        return $this->type=self::TYPE_ADMIN;
    }

    public function getJalaly()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getProfileUrl()
    {
        return asset('images/users/'.$this->profile);
    }
}
