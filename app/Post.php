<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public function like($user_id)
    {
        return $this->hasOne('App\Like', 'post_id')->where('user_id' , $user_id);
    }
}
