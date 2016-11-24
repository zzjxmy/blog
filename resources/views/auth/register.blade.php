@extends('layouts.layout')
@section('content')
    <div class="border-radius-xs register-form">
        <div class="panel-body background-white-color ">
            <h1 class="page-title">注册</h1>
            <form role="form" method="POST" action="{{ url('/register') }}">
                <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">用户名</label>
                    <input type="text" name="account" class="form-control" id="exampleInputEmail1" placeholder="用户名">
                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('account') ? ' has-error' : '' }}">
                    <label for="exampleInputEmail1">账号</label>
                    <input type="text" name="account" class="form-control" id="exampleInputEmail1" placeholder="账号">
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
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-default mz-btn">注册</button>
            </form>
        </div>
    </div>
@endsection

