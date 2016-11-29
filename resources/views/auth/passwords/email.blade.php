@extends('layouts.layout')
@section('content')
    <div class="border-radius-xs login-form">
        <div class="panel-body background-white-color ">
            <h1 class="page-title">忘记密码</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form role="form" method="POST" action="{{ url('/password/email') }}">
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="邮箱">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                {!! csrf_field() !!}
                <button type="submit" class="btn btn-default mz-btn">发送邮件</button>
            </form>
            <ul class="nav nav-list">
                <li class="text-center"><a href="/login">记得密码?去登录</a></li>
            </ul>
        </div>
    </div>
@endsection


