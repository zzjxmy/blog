<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * 一个分类可以有多个文章
     */
    public function blogs(){
        $this->hasMany('App\Model\Blog','id','blog_id');
    }
}
