<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['content','comment_id','user_id'];
    protected $table = 'replys';
    public function comment(){
        return $this->belongsTo('App\Model\Comment','comment_id','id');
    }
    
    public function user(){
        return $this->belongsTo('App\Model\User','user_id','id');
    }
}
