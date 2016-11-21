<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function publish(Request $request){
        if(!$request->isMethod('post')){
            return view('blog.publish');
        }
        
    }
}
