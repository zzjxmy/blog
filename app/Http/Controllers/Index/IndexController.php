<?php

namespace App\Http\Controllers\Index;

use App\Model\Blog;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request){
        $keyword = $request->query('keyword','');
        if(empty($keyword)){
            $obj = Blog::where('state','1');
        }else{
            $obj = Blog::where('state','1')->where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%'.$keyword.'%')
                    ->orWhere('content', 'like', '%'.$keyword.'%');
            });
        }
        $blogs = $obj->whereHas('subjects',function($query) use ($request){
            $category = $request->query('category','');
            if(!empty($category)){
                $query->where('name',$category);
            }
        })->with('subjects')->orderBy('created_at','desc')->paginate(12);
        return view('index.index',['blogs' => $blogs]);
    }
    
    public function article($id){
        $blog = Blog::where(['id' => $id, 'state' => '1'])->with('user')->first();
        //get next and prev
        $next = Blog::where('created_at','>',$blog->created_at)->first(['id']);
        $prev = Blog::where('created_at','<',$blog->created_at)->first(['id']);
        return view('index.article',compact('blog','next','prev'));
    }
}
