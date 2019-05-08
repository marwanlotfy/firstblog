<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     public function posts()
    {
       return $this->hasMany(Post::Class);
    }
    public function likes()
    {
        return $this->hasMany(Like::Class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::Class);
    }
    public function like_this($post_id)
    {
        return Like::Where('user_id',$this->id)->where('post_id',$post_id)->get()->count();
    }
}
