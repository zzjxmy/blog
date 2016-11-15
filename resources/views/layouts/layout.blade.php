<html charset="utf-8">
    <head>
        <title>Mz博客海</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('require.css')
        @include('require.js')
    </head>
    <body>
        @include('layouts.head')
        <div class="container">
            @yield('content')
        </div>
        <div class="container right">
        @include('layouts.page')
        </div>
        <div>
            @include('layouts.foot')
        </div>
    </body>
</html>
