<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * 一个分类可以有多个文章 多对多的关系
     */
    public function blogs(){
        return $this->belongsToMany('App\Model\Blog','blogs_subjects','subject_id','blog_id');
    }
}
