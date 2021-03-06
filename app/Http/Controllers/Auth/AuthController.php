<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use GatewayClient\Gateway;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
    // ThrottlesLogins 错误次数验证
    use AuthenticatesAndRegistersUsers,ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     * 注册、登录之后跳转的地址
     * @var string
     */
    protected $redirectTo = '/';
    
    /**
     * login username
     */
    public $username = 'account';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:8',
            'account' => 'required|max:32|alpha_num|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'account' => $data['account'],
            'email' => $data['email'],
            'password' => md5($data['password']),
        ]);
    }
    
    /**
     * 复写登录验证方法
     * @param \Illuminate\Http\Request  $request
     */
    protected function validateLogin(Request $request){
        $this->validate($request, [
            'account' => 'required|alpha_num|max:32', 'password' => 'required',
        ]);
    }
    
    /**
     * 复写获取验证参数方法 新增is_delete字段验证
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    protected function getCredentials(Request $request)
    {
        $checkData = ['is_delete' => 0];
        return array_merge($request->only($this->loginUsername(), 'password'),$checkData);
    }
    
    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        \Auth::guard($this->getGuard())->logout();
        $info = session('isBind');
        if($info){
            session()->forget('isBind');
            Gateway::$registerAddress = config('chat.registerAddress');
            //通知所有用户，我下线了
            Gateway::bindUid($info['clientId'], $info['uid']);
            Gateway::closeClient($info['clientId']);
        }
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }
}
