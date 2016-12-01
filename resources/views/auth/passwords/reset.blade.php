@extends('layouts.layout')
@section('content')
    <div class="border-radius-xs login-form">
        <div class="panel-body background-white-color ">
            <h1 class="page-title">重置密码</h1>
            <form role="form" method="POST" action="{{ url('password/reset') }}">
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="邮箱" value="{{$email or old('email')}}">
                    <input type="hidden" name="token" class="form-control" id="exampleInputEmail1" placeholder="邮箱" value="{{$token}}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
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
                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="exampleInputPassword2">确认密码</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword2" placeholder="确认密码">
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-default mz-btn">重置密码</button>
            </form>
            <ul class="nav nav-list">
                <li class="text-center"><a href="/login">记得密码?去登录</a></li>
            </ul>
        </div>
    </div>
@endsection


