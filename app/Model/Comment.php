<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name','content','blog_id'];
    
    //定义多对一的关联关系
    public function blog(){
        return $this->belongsTo('App\Model\Blog','blog_id','id');
    }
    
    //定义多对一的关联关系
    public function user(){
        return $this->belongsTo('App\Model\User','user_id','id');
    }
    
    //定义一对多的关系
    public function replies(){
        return $this->hasMany('App\Model\Reply','comment_id','id');
    }
}
