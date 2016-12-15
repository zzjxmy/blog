<?php

namespace App\Http\Controllers\Api;

use \Illuminate\Http\Request;
use \GatewayClient\Gateway;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;

class UserController extends ApiController {
    protected $request;
    
    public function __construct(Request $request){
        $this->request = $request;
    }
    
    public function bindUserBySocketId(){
        $clientId = $this->request->input('socketId');
        if($clientId){
            //bind
            Gateway::$registerAddress = config('chat.registerAddress');
            //如果之前已经连接过，清除之前的连接
            if(session('isBind')){
                Gateway::closeClient(session('isBind')['clientId']);
            }
            $uid = Auth::user()->id;
            $username = Auth::user()->username;
            Gateway::bindUid($clientId, $uid);
            //通知所有用户 排除自己
            Gateway::sendToAll($this->reJson([
                'id' => $uid, 'username' => $username,  'status' => 'online'
            ],'setFriendStatus'));
            //设置已经绑定
            Gateway::setSession($clientId, ['username' => $username,'id' => $uid]);
            session()->set('isBind',['clientId' =>$clientId,'uid' => $uid]);
            return $this->responseJson(['isBind' => true]);
        }
        return $this->responseJson(['isBind' => false]);
    }
}