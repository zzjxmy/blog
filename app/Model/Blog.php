<?php

namespace App\Model;

use Request;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Blog extends Model
{
    //以下字段可以被批量赋值
    protected $fillable = ['title','content','user_id'];
    //使用laravel提供的默认时间
    public $timestamps = true;
    
    //定义文章模型关系，一篇文章只能有一个作者
    public function user(){
        //第一个参数为关联的模型
        //第二个参数为你与关联模型关联的字段
        //第三个参数为关联模型哪个字段与你关联
        return $this->belongsTo('App\Model\User','user_id','id');
    }
    
    //一篇文章有多个评论
    public function comments(){
        //第一个参数为关联的模型
        //第二个参数为关联模型哪个字段与你关联
        //第三个参数为你与关联模型关联的字段
        return $this->hasMany('App\Model\Comment','blog_id','id');
    }
    
    //一篇文章可以有多个标签，一个标签可以有多个文章 多对多关系
    public function tags(){
        /**
         * 第一个是关联表的模型
         * 第二个是中间表的表明，如果没有指定会使用当前模型名s+中间表的模型名s 如：users_subjects)
         * 第三个是当前模型与中间表的关联字段
         * 第四个是关联表与中间表的关联字段
         */
        return $this->belongsToMany('App\Model\Tag','blogs_tags','blog_id','tag_id');
    }
    
    //一篇文章有多个分类 多对多的关系
    public function subjects(){
        return $this->belongsToMany('App\Model\Subject','blogs_subjects','blog_id','subject_id');
    }
    
    /**
     * 自定义验证信息爱
     * @param Request $request
     * @return mixed
     */
    public function verify()
    {
        $validate = [
            'title' => 'required|max:50',
            'subjects' => 'required|array',
            'tags' => 'required|array',
            'content' => 'required',
        ];
        
        return Validator::make(Request::all(),$validate,$this->messages());
    }
    
    /**
     * 获取已定义验证规则的错误消息。
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => '标题是必填的',
            'title.max' => '标题不能超过五十个字',
            'tags.required'  => '至少选择一个标签',
            'tags.array'  => '无效标签',
            'subjects.required'  => '至少选择一个分类',
            'subjects.array'  => '无效分类',
            'content.required'  => '内容是必填的',
        ];
    }
}
