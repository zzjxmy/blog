<?php
if(!function_exists('strip_only_tags')){
    function strip_only_tags($str, $tags = ['script'],$stripContent = true) {
        if (!is_array($tags)) {
            $tags = (strpos($str, '>') !== false ? explode('>', str_replace('<', '', $tags)) : array($tags));
            if (end($tags) == '') {
                array_pop($tags);
            }
        }
        foreach($tags as $tag) {
            if($stripContent){
                $str = preg_replace("'<".$tag."(.*?)'is", htmlspecialchars('<'.$tag), $str);
                $str = preg_replace("'<\/".$tag.">'is", htmlspecialchars('</'.$tag.'>'), $str);
            }else{
                $str = preg_replace("'<".$tag."(.*?)<\/".$tag.">'is", '', $str);
            }
        }
        
        return $str;
    }
}

if(!function_exists('hashidsDecode')){
    function hashidsDecode($str){
        $val = \Hashids::decode($str);
        return count($val)?$val[0]:0;
    }
}

if(!function_exists('reUserInfo')){
    function reUserInfo($user){
        if(is_array($user)){
            $data['username'] = $user['username'];
            $data['id'] = $user['id'];
        }elseif(is_object($user)){
            $data['username'] = $user->username;
            $data['id'] = $user->id;
        }else{
            return [];
        }
        $data['sign'] = config('chat.sign');
        $data['avatar'] = config('chat.avatar');
        return $data;
    }
}