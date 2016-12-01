<?php

namespace App\Http\Controllers\Auth;

use App\Foundation\Auth\MzPassword;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    protected $frequency = 30;  //second default 0
    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    /**
     * 复写发送邮件方法
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendResetLinkEmail(Request $request){
        
        $this->validateSendResetLinkEmail($request);
        if($this->frequency && !$this->checkSendFrequency($request)){
            return redirect()->back()->withErrors(['email' => '发送频率过快，请'.$this->frequency.'秒后再尝试']);
        }
        
        $broker = $this->getBroker();
        $response = MzPassword::broker($broker)->sendResetLink(
            $this->getSendResetLinkEmailCredentials($request),
            //设置邮件标题
            $this->resetEmailBuilder()
        );
        switch ($response) {
            case MzPassword::RESET_LINK_SENT:
                return $this->getSendResetLinkEmailSuccessResponse($response);
            case MzPassword::INVALID_USER:
            default:
                return $this->getSendResetLinkEmailFailureResponse($response);
        }
    }
    
    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Http\Response
     */
    public function showResetForm(Request $request, $token = null)
    {
        if(!$this->checkToken($request,$token)){
            return $this->getEmail();
        }
        
        $email = $request->input('email');
    
        if (property_exists($this, 'resetView')) {
            return view($this->resetView)->with(compact('token', 'email'));
        }
    
        if (view()->exists('auth.passwords.reset')) {
            return view('auth.passwords.reset')->with(compact('token', 'email'));
        }
    
        return view('auth.reset')->with(compact('token', 'email'));
    }
    
    /**
     * 监测发送频率
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function checkSendFrequency(Request $request){
        //获取信息
        $email = $request->get('email');
        $redisEmail = \Crypt::decrypt(Redis::get($email));
        $array = explode('_',(string)$redisEmail);
        if($redisEmail && $array[1]+$this->frequency >= time()){
            return false;
        }
        return true;
    }
    
    /**
     * 检测Token有效性
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return bool
     */
    public function checkToken(Request $request, $token = null)
    {
        $redisToken = Redis::get($request->query('email'));
        if(!$redisToken || $redisToken != $token){
            return false;
        }
        return true;
    }
}
