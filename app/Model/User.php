<?php

namespace App\Model;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Eloquent;

class User extends Eloquent   {
    use EntrustUserTrait;
    
    //定义一对多的关联
    public function blogs(){
        return $this->hasMany('App\Model\Blog','user_id','id');
    }
    
    public function replies(){
        return $this->hasMany('App\Model\Reply','user_id','id');
    }
}