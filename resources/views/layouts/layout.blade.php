<html charset="utf-8" lang="zh-CN">
    <head>
        <title>Mz博客海</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('require.css')
        @include('require.js')
    </head>
    <body>
        @include('layouts.head')
        <div class="row">
            <div class="container">
                <div class="col-md-10 no-padding-left">
                    @yield('content')
                </div>
                <div class="col-md-2">
                    @include('layouts.widget')
                </div>
            </div>
        </div>
        @include('layouts.foot')
    </body>
</html>
