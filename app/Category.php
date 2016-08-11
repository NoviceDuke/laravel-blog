<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //對應table
    protected $table ='categories';

    protected $fillable = [
            'name',         //種類名稱
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function addPost(Post $post)
    {
        return $this->posts()->save($post);
    }
}
