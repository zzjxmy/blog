<?php

namespace App\Http\Controllers;

class ApiController extends Controller {
    /**
     * @param array $data 返回的数据
     * @param int $status 请求状态 200 成功
     * @param int $code 业务处理状态 0 成功
     * @param string $message 错误信息
     * @return resource
     */
    public function responseJson($data = [] , $status = 200 , $code = 0 ,$message = ''){
        return response()->json(['status' => $status , 'code' => $code , 'msg' => $message , 'data' => $data ]);
    }
}