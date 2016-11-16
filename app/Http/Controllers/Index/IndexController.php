<?php

namespace App\Http\Controllers\Index;

use App\Model\Blog;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request){
        $blogs = Blog::where('state','1')->whereHas('subjects',function($query) use ($request){
            $category = $request->query('category','');
            if(!empty($category)){
                $query->where('name',$category);
            }
        })->with('subjects')->orderBy('created_at','desc')->paginate(12);
        return view('index.index',['blogs' => $blogs]);
    }
    
    public function article($id){
        
    }
}
