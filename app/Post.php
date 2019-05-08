<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
      return  $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::Class);
    }
    public function Comments()
    {
        return $this->hasMany(Comment::Class);
    }
    public function count_mylikes()
    {
        return $this->likes->count();
    }
    public function count_mycomments()
    {
        return $this->comments->count();
    }
}
