<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller {
    /**
     * @param array $data 返回的数据
     * @param int $status 请求状态 200 成功
     * @param int $code 业务处理状态 0 成功
     * @return resource
     */
    public function responseJson($data = [] , $status = 200 , $code = 0){
        $request = new Request();
        return response()->json(['status' => $status , 'code' => $code , 'data' => $data ]);
    }
}