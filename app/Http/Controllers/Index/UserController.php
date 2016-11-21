<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserController extends Controller
{
    protected $request;
    
    public function __construct(Request $request){
        $this->request = $request;
    }
    
    public function updateInfo(){
        if(!$this->request->isMethod('post')){
            return view('user.info');
        }
    }
    
    public function updatePassword(){
        if(!$this->request->isMethod('post')){
            return view('user.password');
        }
        
    }
}
