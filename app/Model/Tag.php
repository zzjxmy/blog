<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];
    
    //定义多对多的关系
    public function blogs(){
        return $this->belongsToMany('App\Model\Blog','blogs_tags','tag_id','blog_id');
    }
}
