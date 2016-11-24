@extends('layouts.layout')
@section('content')
    <div class="col-md-9 background-white-color border-radius-xs">
        <div class="list-group margin-top-md">
            @if(count($blogs))
                @foreach($blogs as $blog)
                    <a href="{{url('article',[Hashids::encode($blog->id)])}}" class="list-group-item index-a">
                        <h4 class="list-group-item-heading">{{strip_tags($blog->title)}}</h4>
                        <p class="list-group-item-text blog-list-content">{{strip_tags(str_limit($blog->content,200))}}</p>
                        <p class="margin-top-xs no-margin-bottom" style="height: 20px;">
                            @foreach($blog->tags as $tag)
                                <span class="label {{$tag->target_class}}">{{$tag->name}}</span>
                            @endforeach
                            <span class="target-time">
                                来自：<strong>{{$blog->user->username}}</strong> {{$blog->created_at->diffForHumans()}}发布
                            </span>
                        </p>
                    </a>
                @endforeach
            @else
                <div class="jumbotron">
                    <h1>没有发现对应的博客内容</h1>
                    <p>...</p>
                    <p><a class="btn btn-primary btn-lg" href="/" role="button">更多</a></p>
                </div>
            @endif
        </div>
    </div>
    <div class="col-md-3 no-padding-right">
        @include('layouts.widget')
    </div>
    {{ $blogs->links() }}
@endsection