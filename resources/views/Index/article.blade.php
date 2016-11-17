@extends('layouts.layout')
@section('content')
    <div class="page-header">
        <h3>{{$blog->title}}</h3>
        <p class="text-right">
            <small>
                作者：<strong>{{$blog->user->username}}</strong>
                <span class="padding-left-xs">时间：<strong>{{$blog->created_at}}</strong></span>
            </small>
        </p>
    </div>
    <div class="bs-callout bs-callout-danger">
        <p>{{strip_tags(mb_strimwidth($blog->content,0,200,'...','utf-8'))}}</p>
    </div>
    <div class="content">
        <p>{!! $blog->content !!}</p>
    </div>
    <nav>
        <ul class="pager">
            <li class="previous {{$prev?'':'disabled'}}"><a href="{{$prev?url('article',[$prev->id]):'#'}}">&larr; prev</a></li>
            <li class="next {{$next?'':'disabled'}}"><a href="{{$next?url('article',[$next->id]):'#'}}">Next &rarr;</a></li>
        </ul>
    </nav>
@endsection