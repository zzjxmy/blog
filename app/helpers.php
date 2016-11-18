<?php
if(!function_exists('strip_only_tags')){
    function strip_only_tags($str, $tags) {
        if (!is_array($tags)) {
            $tags = (strpos($str, '>') !== false ? explode('>', str_replace('<', '', $tags)) : array($tags));
            if (end($tags) == '') {
                array_pop($tags);
            }
        }
        foreach($tags as $tag) {
            $str = preg_replace("'<".$tag."(.*?)<\/".$tag.">'is", '', $str);
        }
        
        return $str;
    }
}