<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogsTag extends Model
{
    public $fillable = ['tag_id', 'blog_id'];
    public $timestamps = false;
}
