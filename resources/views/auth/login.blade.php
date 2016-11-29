@extends('layouts.layout')
@section('content')
    <div class="border-radius-xs login-form">
        <div class="panel-body background-white-color ">
            <h1 class="page-title">登录</h1>
            <form role="form" method="POST" action="{{ url('/login') }}">
                <div class="form-group {{ $errors->has('account') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">账号</label>
                    <input type="text" name="account" class="form-control" id="exampleInputEmail1" placeholder="账号" value="{{old('account')}}">
                    @if ($errors->has('account'))
                        <span class="help-block">
                            <strong>{{ $errors->first('account') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="exampleInputPassword1">密码</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="密码">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember_token"> 记住我
                    </label>
                </div>
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-default mz-btn">登录</button>
            </form>
            <ul class="nav nav-list">
                <li class="text-center"><a href="/password/reset">忘记密码?</a></li>
                <li class="text-center"><a href="/register">没有账号?</a></li>
            </ul>
        </div>
    </div>
@endsection

