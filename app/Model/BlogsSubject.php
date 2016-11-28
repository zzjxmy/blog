<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogsSubject extends Model
{
    public $fillable = ['subject_id', 'blog_id'];
    public $timestamps = false;
    
    public function blogs(){
        return $this->belongsToMany('App\Model\Blog','blogs_subjects','subject_id','blog_id');
    }
}
