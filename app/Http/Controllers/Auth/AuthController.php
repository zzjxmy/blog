<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
            'account' => array('required','regex:/[a-zA-Z]+/i','max:32','unique:users'),
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
            'account' => 'required', 'password' => 'required',
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
}
