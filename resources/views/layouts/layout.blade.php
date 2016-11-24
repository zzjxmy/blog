<html xmlns="http://www.w3.org/1999/xhtml" charset="utf-8" lang="zh-CN">
    <head>
        <title>{{config('comment.comment.title') . config('comment.comment.other_title')}}</title>
        <meta name="keywords" content="{{config('comment.comment.title') . config('comment.comment.other_title')}}">
        <meta name="description" content="{{config('comment.comment.description') . config('comment.comment.other_desc')}}">
        <meta name="title" content="{{config('comment.comment.title') . config('comment.comment.other_title')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('require.css')
        @include('require.js')
    </head>
    <body>
        <div id="wrap">
            @include('layouts.head')
            <div class="container main-container">
                @yield('content')
            </div>
        </div>
        <div>
            @include('layouts.foot')
        </div>
    </body>
</html>
