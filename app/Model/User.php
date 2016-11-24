<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable {
    use EntrustUserTrait;
    protected $fillable = ['username', 'account','email','password'];
    //定义一对多的关联
    public function blogs(){
        return $this->hasMany('App\Model\Blog','user_id','id');
    }
    
    public function replies(){
        return $this->hasMany('App\Model\Reply','user_id','id');
    }
}