<?php
/**
 * CopyRight © 2016
 * @desc 这里是控制器描述
 * @author   张志坚<137512638@qq.com>
 * @version  1.0(系统当前版本号)
 * @name:     IndexController.php（类名/函数名）
 * @date:     2016-10-17
 * @directory: /app/classes/Controller/laravel5.2/IndexController.php
 */

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Request;

class IndexController extends Controller {
    public function index(\Illuminate\Http\Request $request,Response $response){
        //以下的函数都可获取全部，或者获取单个参数
        //method() 获取请求方式 GET POST PUT DELETE
        //url() 获取请求URL不包含GET参数
        //fullUrl() 获取完整的请求URL
        //path() 获取请求URL 例如：/home
        //input() 获取所有输入参数 GET POST
        //query() 获取所有GET参数
        //all() 获取所有参数 request query server files cookies headers session pathInfo method
        //file() 获取所有的请求文件
        //session() 获取所有的session
        //header() 获取所有的请求头信息
        //except() 获取除了这个参数之外的其他的参数
        //一次有效 下次程序启动会自动删除
        //flash() 将请求的参数转存到session中
        //flashOnly() 将指定的请求参数转存到session中
        //flashExcept() 将指定的请求参数之外的其他参数转存到session中
        //old() 获取一次性session
        //依赖注入 支持request方法
        //$params = $request->all();
        //make
        //$request = app('Request');
        //$params = $request->all();
        //外观别名
        //$params = Request::all();
        
        //自定义响应内容
        //return (new Response('This is content',404))->header('Content-Type','text/html; charset=UTF-8');
        return view('index.index');
    }
    
    public function create(){
        
    }
    
    public function store(){
        
    }
    
    public function show(){
        
    }
    
    public function edit(){
        
    }
    
    public function update(){
        
    }
    
    public function destroy(){
        
    }
    
    
}