<?php

namespace App\Http\Controllers\Index;

use App\Model\Blog;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Vinkla\Hashids\Facades\Hashids;

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
        $blogs = $obj->whereHas('tags',function($query) use ($request){
            $category = $request->query('tag','');
            if(!empty($category)){
                $query->where('name',$category);
            }
        })->with('tags')->orderBy('created_at','desc')->paginate(12);
        return view('index.index',['blogs' => $blogs]);
    }
    
    public function article($id){
        $id = Hashids::decode($id);
        $blog = Blog::where(['id' => count($id)?$id[0]:0, 'state' => '1'])->with('user')->first();
        if(!$blog){
            return view('errors.404');
        }
        //get next and prev
        $prev = Blog::where('created_at','>',$blog->created_at)->orderBy('created_at','desc')->first(['id']);
        $next = Blog::where('created_at','<',$blog->created_at)->orderBy('created_at','desc')->first(['id']);
        $desc = strip_tags(str_limit($blog->content,200));
        Config::set('comment.comment.other_title',' - '.$blog->title);
        Config::set('comment.comment.other_desc',' - '.$desc);
        return view('index.article',compact('blog','next','prev','desc'));
    }
}
