<?php

namespace App\Http\Controllers\Index;

use DB;
use App\Model\Blog;
use App\Model\BlogsSubject;
use App\Model\BlogsTag;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Exception;
use YuanChao\Editor\EndaEditor;

class BlogController extends Controller
{
    
    public function blogList(){
        $blogs = Blog::where(['user_id' => Auth::user()->id,'state' => 1])
            ->with('user')
            ->with('subjects')
            ->with('tags')->paginate(12);
        return view('blog.blog',compact('blogs'));
    }
    
    public function publish(Request $request){
        if(!$request->isMethod('post')){
            return view('blog.publish');
        }
        $blogObj = new Blog();
        $validator = $blogObj->verify();
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            DB::transaction(function() use ($blogObj,$request){
                $blogObj = $blogObj->create(array_merge($request->only(['title','content']),['user_id'=>Auth::user()->id]));
                $blogLastId = $blogObj->id;
                BlogsSubject::insert(array_reduce($request->input('subjects'),function($v,$w) use ($blogLastId){
                    $v[] = ['subject_id' => $w , 'blog_id' => $blogLastId];
                    return $v;
                },[]));
                BlogsTag::insert(array_reduce($request->input('tags'),function($v,$w) use ($blogLastId){
                    $v[] = ['tag_id' => $w , 'blog_id' => $blogLastId];
                    return $v;
                },[]));
            });
            return redirect()->back()->with('success' , trans('messages.success'));
        }catch (Exception $exception){
            return redirect()->back()->with('error' , trans('messages.error'));
        }
    }
    
    public function delete($blogId){
        $result = true;
        $result = Blog::where(['user_id' => Auth::user()->id, 'id' =>Hashids::decode($blogId)])->delete();
        $message = $result?'success':'error';
        return redirect()->to('user/blog')->with($message, trans($message));
    }
    
    public function postUpload(){
        // endaEdit 为你 public 下的目录 update 2015-05-19
        $data = EndaEditor::uploadImgFile('endaEdit');
        return json_encode($data);
    }
    
}
