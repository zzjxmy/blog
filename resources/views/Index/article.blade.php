@extends('layouts.layout')
@section('content')
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
        <p>{{strip_tags(str_limit($blog->content,200))}}</p>
    </div>
    <div class="content">
        <p>{!! strip_only_tags($blog->content,'script') !!}</p>
    </div>
    <nav>
        <ul class="pager">
            <li class="previous {{$prev?'':'disabled'}}"><a href="{{$prev?url('article',[$prev->id]):'#'}}">&larr; prev</a></li>
            <li class="next {{$next?'':'disabled'}}"><a href="{{$next?url('article',[$next->id]):'#'}}">Next &rarr;</a></li>
        </ul>
    </nav>
@endsection