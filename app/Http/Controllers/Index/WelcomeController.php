<?php
/**
 * CopyRight © 2016
 *
 * @desc 这里是控制器描述
 * @author   张志坚<137512638@qq.com>
 * @version  1.0(系统当前版本号)
 * @name:     WelcomeController.php（类名/函数名）
 * @date:     2016-11-02
 * @directory: /app/classes/Controller/laravel5.2/WelcomeController.php
 */

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Model\User;

class WelcomeController extends Controller  {
    public function index(){
        //return redirect()->route('a');
        //return redirect('show',302);
        //$res = DB::table('users')->get();
        $res = User::all();
        var_dump($res);
    }
    
    public function show(){
        return __METHOD__;
    }
    
    //关系
    public function relations(){
        //获取含有博客的用户
        //$users = User::has('blogs')->get();
        //获取含有博客的用户和用户博客信息
        //$users = User::has('blogs')->with('blogs')->get();
        //获取含有博客和含有回复的用户信息
        //$users = User::has('blogs')->has('replies')->get();
        //获取含有博客的和含有回复的用户信息、博客信息、回复信息
        //$users = User::has('blogs')->has('replies')->with('blogs','replies')->get();
        //$users = User::has('blogs')->has('replies')->with('blogs')->with('replies')->get();
        
        //$users = User::withCount('blogs')->withCount('replies')->get();
        //$users = User::count();
        //$users = User::get(['id']);
        //查询，如果不存在则创建新的记录
        //$users = User::firstOrCreate(['username'=>'user4','account'=>'user4','password'=>md5('123456')]);
        //查询，如果不存在则创建新的模型
        $users = User::firstOrNew(['username'=>'user4','account'=>'user4','password'=>md5('123456')]);
        dd($users->save());
    }
    
    //session
    public function session(){
        //这里把session存入redis数据库
        //session(['user'=>'zhangzhijian']);
        //session()->flush();
        var_dump(session()->all());
        //dd(session()->flush());
    }
}