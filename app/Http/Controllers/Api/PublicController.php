<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Model\User;
use GatewayClient\Gateway;
use Illuminate\Support\Facades\Auth;

class PublicController extends ApiController  {
    
    public function checkUserIsLogin()
    {
        return $this->responseJson(['isLogin' => !Auth::guest()]);
    }
    public function getInfo(){
        $data = [];
        if(!Auth::guest()){
            $data['mine'] = reUserInfo(Auth::user());
            $data['mine']['status'] = 'online';
            $lists = User::where('id' , '!=' ,Auth::user()->id)->get();
        }else{
            $lists = User::get();
        }
        Gateway::$registerAddress = config('chat.registerAddress');
        //获取所有的用户
        $data['friend'][0]['groupname'] = 'Mz博客海';
        $data['friend'][0]['id'] = 1;
        foreach ($lists as $list){
            $info = reUserInfo($list);
            //check isOnline
            $info['status'] = Gateway::isUidOnline($info['id'])?'online':'offline';
            $data['friend'][0]['list'][] = $info;
        }
        return $this->responseJson($data);
    }
}