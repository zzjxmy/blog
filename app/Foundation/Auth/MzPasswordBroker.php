<?php

namespace App\Foundation\Auth;

use Closure;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redis;
use Crypt;

class MzPasswordBroker extends PasswordBroker {
    /**
     * 发送邮件
     *
     * @param  array  $credentials
     * @param  \Closure|null  $callback
     * @return string
     */
    public function sendResetLink(array $credentials, Closure $callback = null)
    {
        //监测用户信息 By Email From User Table
        $user = $this->getUser($credentials);
        
        if (is_null($user)) {
            return static::INVALID_USER;
        }
        
        //生成令牌，并且插入数据至数据库
        $token = $this->reToken($user);
        //发送邮件
        $this->emailResetLink($user, $token, $callback);
        //发送成功之后将Token保存在Redis中 20分钟有效
        Redis::set($user->getEmailForPasswordReset(),$token);
        Redis::expire($user->getEmailForPasswordReset(),1200);
        return static::RESET_LINK_SENT;
    }
    
    /**
     * Send the password reset link via e-mail.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $token
     * @param  \Closure|null  $callback
     * @return int
     */
    public function emailResetLink(CanResetPassword $user, $token, Closure $callback = null)
    {
        // We will use the reminder view that was given to the broker to display the
        // password reminder e-mail. We'll pass a "token" variable into the views
        // so that it may be displayed for an user to click for password reset.
        $view = $this->emailView;
        $email = Config::get('mail');
        return $this->mailer->send($view, compact('token', 'user'), function ($m) use ($user, $token, $callback, $email) {
            $m->from($email['username']);
            $m->to($user->getEmailForPasswordReset(),$user->username);
            
            if (! is_null($callback)) {
                call_user_func($callback, $m, $user, $token);
            }
        });
    }
    
    
    /**
     * Create a new token record.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @return string
     */
    public function reToken(CanResetPassword $user){
        //生成Token
        return Crypt::encrypt($user->getEmailForPasswordReset().'_'.time());
    }
}