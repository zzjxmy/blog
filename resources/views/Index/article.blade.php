@extends('layouts.layout')
@section('content')
    <div class="col-md-9 background-white-color border-radius-xs">
        <div class="page-header">
            <h3>{{$blog->title}}</h3>
            <p class="text-right">
                <small>
                    作者：<strong>{{strip_tags($blog->user->username)}}</strong>
                    <span class="padding-left-xs"><strong>{{$blog->created_at->diffForHumans()}}</strong></span>
                </small>
            </p>
        </div>
        <div class="bs-callout bs-callout-danger">
            <p>{{$desc}}</p>
        </div>
        <div class="content">
            <p>{!! strip_only_tags($blog->content,'script') !!}</p>
        </div>
        <nav>
            <ul class="pager">
                <li class="previous {{$prev?'':'disabled'}}"><a href="{{$prev?url('article',[Hashids::encode($prev)]):'#'}}">上一篇</a></li>
                <li class="next {{$next?'':'disabled'}}"><a href="{{$next?url('article',[Hashids::encode($next)]):'#'}}">下一篇</a></li>
            </ul>
        </nav>
    </div>
    <div class="col-md-3 no-padding-right">
        @include('layouts.widget')
    </div>
@endsection