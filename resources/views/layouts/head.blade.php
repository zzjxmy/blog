<header class="navbar navbar-static-top no-margin-bottom" id="top" role="banner">
        <nav class="navbar navbar-default background-white-color no-border-radius " role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{url('/')}}">Mz博客海</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        {{--<li class="active"><a href="#">首页</a></li>--}}
                        <li><a href="{{url('/')}}">首页</a></li>
                        <li><a href="{{url('/subjects')}}">分类</a></li>
                        <li><a href="{{url('/tags')}}">标签</a></li>
                        <li><a href="{{url('/publish')}}">发布</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search" action="{{url('/')}}" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control no-border-radius" placeholder="{{Request::query('keyword','搜索')}}" name="keyword">
                        </div>
                        <button type="submit" class="btn btn-default index-search no-border-radius"><span class="glyphicon glyphicon-search"></span></button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->username}}<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{url('/user/blog')}}">我的博客</a></li>
                                    <li><a href="#">我的收藏</a></li>
                                    <li><a href="#">个人信息</a></li>
                                    <li><a href="#">修改密码</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{url('/logout')}}">注销</a></li>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{url('/login')}}">登录</a></li>
                            <li><a href="{{url('/register')}}">注册</a></li>
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
</header>
