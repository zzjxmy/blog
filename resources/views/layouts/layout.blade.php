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
                <div class="col-md-10 background-white-color border-radius-xs">
                    @yield('content')
                </div>
                <div class="col-md-2 no-padding-right">
                    @include('layouts.widget')
                </div>
            </div>
            @include('layouts.foot')
        </div>

    </body>
</html>
