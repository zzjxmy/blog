<?php

namespace App\Http\Controllers\Index;

use App\Model\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use YuanChao\Editor\EndaEditor;

class IndexController extends Controller
{
    protected $request;
    
    public function __construct (Request $request) {
        $this->request = $request;
    }
    
    public function index(){
        $keyword = $this->request->query('keyword','');
        if(empty($keyword)){
            $obj = Blog::where('state','1');
        }else{
            $obj = Blog::where('state','1')->where(function ($query) use ($keyword) {
                $query->where('title', 'like', '%'.$keyword.'%')
                    ->orWhere('content', 'like', '%'.$keyword.'%');
            });
        }
        $blogs = $obj->with('subjects')->with('tags')->with('user')->orderBy('created_at','desc')->paginate(12);
        return view('index.index',['blogs' => $blogs]);
    }
    
    public function searchTag($tag){
        $blogs = Blog::where('state','1')->whereHas('tags',function($query) use ($tag){
            $query->where('name',$tag);
        })->with('subjects')->with('tags')->with('user')->orderBy('created_at','desc')->paginate(12);
        return view('index.index',['blogs' => $blogs]);
    }
    
    public function searchSubject($subject){
        $blogs = Blog::where('state','1')->whereHas('subjects',function($query) use ($subject){
            $query->where('name',$subject);
        })->with('subjects')->with('tags')->with('user')->orderBy('created_at','desc')->paginate(12);
        return view('index.index',['blogs' => $blogs]);
    }
    
    public function searchUser($userName){
        $blogs = Blog::where('state','1')->whereHas('user',function($query) use ($userName){
            $query->where('username',$userName);
        })->with('subjects')->with('tags')->with('user')->orderBy('created_at','desc')->paginate(12);
        return view('index.index',['blogs' => $blogs]);
    }
    
    public function article($id){
        $blog = Blog::where(['id' => hashidsDecode($id), 'state' => '1'])->with('user')->with('subjects')->with('tags')->first();
        if(!$blog){
            abort(404);
        }
        $blog->increment('look_num');
        //get next and prev
        $prev = Blog::where('created_at','>',$blog->created_at)->orderBy('created_at','desc')->first(['id']);
        $next = Blog::where('created_at','<',$blog->created_at)->orderBy('created_at','desc')->first(['id']);
        $desc = str_limit(strip_tags(EndaEditor::MarkDecode($blog->content),200));
        Config::set('comment.comment.other_title',' - '.$blog->title);
        Config::set('comment.comment.other_desc',' - '.$desc);
        return view('index.article',compact('blog','next','prev','desc'));
    }
}
