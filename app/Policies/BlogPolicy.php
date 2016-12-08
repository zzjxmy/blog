<?php

namespace App\Policies;

use App\Model\Blog;
use App\Model\User;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\AuthManager;

class BlogPolicy
{
    use HandlesAuthorization;
    protected $user;
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //博客授权策略
        if(!$this->user instanceof AuthManager){
            $this->user = Auth::user();
        }
    }
    
    public function update(User $user,Blog $blog){
        if($user->id != $blog->user_id){
            abort(404);
        }
    }
    
    public function delete(){
        
    }
}
