<?php

namespace App\Http\Controllers\Index;

use DB;
use Gate;
use App\Model\Blog;
use App\Model\BlogsSubject;
use App\Model\BlogsTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Exception;
use YuanChao\Editor\EndaEditor;

class BlogController extends Controller
{
    /**
     * blog list
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function blogList()
    {
        $blogs = Blog::where(['user_id' => Auth::user()->id,'state' => 1])
            ->with('user')
            ->with('subjects')
            ->with('tags')->paginate(12);
        return view('blog.blog',compact('blogs'));
    }
    
    /**
     * publish blog
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function publish(Request $request)
    {
        if(!$request->isMethod('post'))return view('blog.publish');
        $blogObj = new Blog();
        $validator = $blogObj->verify($request);
        if($validator->fails())return redirect()->back()->withErrors($validator)->withInput();
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
    
    /**
     * update blog by id
     * @param $blogId
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($blogId,Request $request)
    {
        $result = Blog::where(['id' =>hashidsDecode($blogId)])->with('subjects')->with('tags')->first();
        //策略验证
        !$result?abort(404):Gate::denies('update',$result);
    
        $blog = $result->toArray();
        //get subject ids
        //get tag ids
        $blogSubjects = array_column($blog['subjects'],'id');
        $blogTags = array_column($blog['tags'],'id');
        
        if(\Request::isMethod('post')){
            $obj = new Blog();
            $validator = $obj->verify($request);
            if($validator->fails())return redirect()->back()->withErrors($validator)->withInput();
            unset($obj);
            try{
                DB::transaction(function() use ($result,$request,$blogSubjects,$blogTags){
                    //update blog
                    $result->title = $request->input('title');
                    $result->content = $request->input('content');
                    $result->save();
                    //save blog belong subjects
                    $addSubjects = array_diff($request->input('subjects'),$blogSubjects);
                    $delSubjects = array_diff($blogSubjects,$request->input('subjects'));
                    if($addSubjects)$result->subjects()->attach($addSubjects);
                    if($delSubjects)$result->subjects()->detach($delSubjects);
                    //save blog belong tags
                    $addTags = array_diff($request->input('tags'),$blogTags);
                    $delTags = array_diff($blogTags,$request->input('tags'));
                    if($addTags)$result->tags()->attach($addTags);
                    if($delTags)$result->tags()->detach($delTags);
                });
                return redirect()->back()->with('success',trans('messages.success'));
            }catch (\Exception $exception){
                return redirect()->back()->with('error',trans('messages.error'))->withInput();
            }
        }
        return view('blog.update',compact('blog','blogSubjects','blogTags'));
    }
    
    /**
     * delete blog by id
     * @param $blogId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($blogId)
    {
        $result = Blog::where(['user_id' => Auth::user()->id, 'id' =>hashidsDecode($blogId)])->delete();
        $message = $result?'success':'error';
        return redirect()->to('user/blog')->with($message, trans($message));
    }
    
    /**
     * content img upload
     * @return string
     */
    public function postUpload()
    {
        // endaEdit 为你 public 下的目录 update 2015-05-19
        $data = EndaEditor::uploadImgFile('endaEdit');
        return json_encode($data);
    }
    
}
