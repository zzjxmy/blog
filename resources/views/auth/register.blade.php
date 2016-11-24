@extends('layouts.layout')
@section('content')
    <div class="border-radius-xs register-form">
        <div class="panel-body background-white-color ">
            <h1 class="page-title">注册</h1>
            <form role="form" method="POST" action="{{ url('/register') }}">
                <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="exampleInputUserName1">用户名</label>
                    <input type="text" name="username" class="form-control" id="exampleInputUserName1" placeholder="用户名" value="{{old('username')}}">
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">邮箱</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="邮箱" value="{{old('email')}}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('account') ? ' has-error' : '' }}">
                    <label for="exampleInputAccount1">账号</label>
                    <input type="text" name="account" class="form-control" id="exampleInputAccount1" placeholder="账号" value="{{old('account')}}">
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
                <div class="form-group {{ $errors->has('password_confirmation ') ? ' has-error' : '' }}">
                    <label for="exampleInputPassword2">确认密码</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword2" placeholder="确认密码">
                    @if ($errors->has('password_confirmation '))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation ') }}</strong>
                        </span>
                    @endif
                </div>
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-default mz-btn">注册</button>
            </form>
            <ul class="nav nav-list">
                <li class="text-center"><a href="/login">已有账号?</a></li>
            </ul>
        </div>
    </div>
@endsection

