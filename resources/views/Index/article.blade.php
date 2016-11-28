@extends('layouts.layout')
@section('content')
    <div class="col-lg-9 col-md-8 background-white-color no-border-radius">
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
                <li class="previous {{$prev?'':'disabled'}}"><a href="{{$prev?url('article',[Hashids::encode($prev->id)]):'#'}}">上一篇</a></li>
                <li class="next {{$next?'':'disabled'}}"><a href="{{$next?url('article',[Hashids::encode($next->id)]):'#'}}">下一篇</a></li>
            </ul>
        </nav>
    </div>
    <div class="col-lg-3 col-md-4 no-padding-right">
        <div class="background-white-color" style="padding:20px;">
            <h5>统计</h5>
            <ul class="list-group">
                <a href="javascript:;" class="list-group-item no-border no-padding-left"><span class="glyphicon glyphicon-thumbs-up"></span> 0 点赞</a>
                <a href="javascript:;" class="list-group-item no-border no-padding-left"><span class="glyphicon glyphicon-heart"></span> {{$blog->praise_num}} 收藏</a>
                <a href="javascript:;" class="list-group-item no-border no-padding-left"><span class="glyphicon glyphicon-eye-open"></span> {{$blog->look_num}} 浏览</a>
            </ul>
            <h5>分类</h5>
            <ul class="list-group">
                @foreach($blog->subjects as $subject)
                    <a href="/search/subject/{{$subject->name}}" class="padding-right-xs">
                        {{$subject->name}}
                    </a>
                @endforeach
            </ul>
            <h5>标签</h5>
            <ul class="list-group">
                @foreach($blog->tags as $tag)
                    <a href="/search/tag/{{$tag->name}}" class="padding-right-xs">
                        {{$tag->name}}
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
@endsection