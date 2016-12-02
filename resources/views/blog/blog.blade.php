@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row push-down">
            <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                <h1 class="page-title"> 我的博客 </h1>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
            </div>
        </div>
        <div class="row trick-container">
            @include('layouts.message')
            @foreach($blogs as $blog)
                <div class="trick-card col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="trick-card-inner js-goto-trick" data-slug="964668c3e3dc5a59216467c36b0e52b0">
                        <a class="trick-card-title" href="{{url('/article',Hashids::encode($blog->id))}}">
                            {{str_limit($blog->title,62)}}
                        </a>
                        <div class="trick-card-stats trick-card-by">
                            by <a href="{{url('/search/user',$blog->user->username)}}" title="{{$blog->user->username}}">{{$blog->user->username}}</a>
                        </div>
                        <div class="trick-card-stats clearfix">
                            <div class="trick-card-timeago">发布于 {{$blog->created_at->diffForHumans()}} 于
                                @foreach($blog->subjects as $subject)
                                    <a href="{{url('/search/subject',$subject->name)}}" title="{{$subject->name}}">{{$subject->name}}</a>
                                @endforeach
                            </div>
                            <div class="trick-card-stat-block"><span class="glyphicon glyphicon-eye-open"></span> {{$blog->look_num}}</div>
                            <div class="trick-card-stat-block text-center">
                                <span class="glyphicon glyphicon-thumbs-up"></span>
                                <a href="#" data-disqus-identifier="72" style="color: #777;">{{$blog->praise_num}}</a>
                            </div>
                            <div class="trick-card-stat-block text-right"><span class="glyphicon glyphicon-heart"></span> 0</div>
                        </div>
                        <div class="trick-card-tags clearfix">
                            @foreach($blog->tags as $tag)
                                <a href="{{url('/search/tag',$tag->name)}}" class="tag" title="{{$tag->name}}">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                {{ $blogs->links() }}
            </div>
        </div>
    </div>

@endsection