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
use App\Jobs\SendReminderEmail;
use App\Model\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

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
        //$users = User::findOrNew(['username'=>'user4','account'=>'user4','password'=>md5('123456')]);
        //如果不存在则抛出异常
        //$users = User::findOrFail(['username'=>'user4','account'=>'user4','password'=>md5('123456')]);
        dd($users->save());
    }
    
    //session
    public function session(){
        //这里把session存入redis数据库 如果请求被终止，比如使用了die exit函数，则session为一次有效，还没设置有效时间
        //session(['user'=>'zhangzhijian']);
        //清空session
        //session()->flush();
        //session()->set('user','hellow');
        //将一个新的数据加入现有的 session 内 和set方法是一样
        //session()->put('user','zhangzhijian');
        //保存数据进 Session 数组值中
        //session()->set('row',['a','b']);
        //session()->push('row','c');
        //从session中取出值并删除它
        //$user = session()->pull('user');
        //var_dump($user);
        //从session中删除一条数据
        //session()->forget('row');
        //从新生成sessionID 设置cookie 重新生成session数据，抛弃之前的数据，但是并不清空
        //session()->regenerate();
        var_dump(session()->all());
    }
    
    //redis
    public function redis(){
        /**
         * 队列
         */
        //lpush将一个或多个值压入到队列前面
        //Redis::lpush('name','zhangzhijian','xumengyun');
        //rpush将一个或多个值压入到队尾
        //Redis::rpush('name','hellow','helloword');
        //linsert将值插入到队列对应的值 前面或者后面  before after
        //Redis::linsert('name','after','xumengyun','hellow im zhangzhijian');
        //根据下标，获取队列中的值
        //var_dump(Redis::lindex('name',0));
        //lrange 获取指定范围的值
        //var_dump(Redis::lrange('name',0,1));
        //获取队列的长度
        //var_dump(Redis::llen('name'));
        //lset设置下标为index的值
        //Redis::lset('name',0,'lovexumengyun');
        //lpop 从队列头部弹出一条数据
        //Redis::lpop('name');
        //rpop 从队列尾部弹出弹初一条数据
        //Redis::rpop('name');
        /**
         * key操作
         */
        //重命名key
        //Redis::rename('name','newname');
        //检查key是否存在
        //var_dump(Redis::exists('name'));
        //设置key的有效时间
        //Redis::expire('newname',10);
        //删除key
        //Redis::del('newname');
        //获取key的有效时间
        //var_dump(Redis::ttl('newname'));
        //var_dump(Redis::lrange('newname',0,Redis::llen('newname')));
        //Redis::publish('redis-msg','I am Mz '.time());
        /**
         * 字符串
         */
        //设置值
        Redis::set('username','Mz');
        //获取值
        //var_dump(Redis::get('username'));
        //值加一 如果值不是整数，无法加一
        //Redis::incr('username');
        //值减一 如果值不是整数，无法减一
        //Redis::decr('username');
        var_dump(Redis::get('username'));
    }
    
    public function cookie(){
        //expires  有效时间  不设置的话，则在浏览器关闭之后就失效 如果有效时间设置为小于当前时间，则视为删除cookie
        //path     cookie的生效位置
        //domain   生效的域
        //secure   是否为安全性cookie，如果设置安全性的话，则在https中生效
        //httponly 设置之后，javascript无法访问
        setcookie('name','zhangzhijian');
    }
    
    //消息队列
    public function queue(){
        $user = User::find(3);
        $email = (new SendReminderEmail($user))
            //设置延迟执行时间 单位 s
            //->delay(60*5)
            //设置所属队列
            ->onQueue('emails');
            //设置连接 redis sync redis beanstalkd sqs
            //->onConnection('database');
        $this->dispatch($email);
        return view('welcome');
    }
}