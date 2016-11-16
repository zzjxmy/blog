@extends('layouts.layout')
@section('content')
    <div class="list-group no-margin-bottom">
        @foreach($blogs as $blog)
            <a href="{{url('article',[$blog->id])}}" class="list-group-item ">
                <h4 class="list-group-item-heading">{{strip_tags($blog->title)}}</h4>
                <p class="list-group-item-text blog-list-content">{{strip_tags(mb_strimwidth($blog->content,0,200,'...','utf-8'))}}</p>
                <p class="margin-top-xs no-margin-bottom">
                    @foreach($blog->subjects as $subject)
                        <span class="label {{$subject->target_class}}">{{$subject->name}}</span>
                    @endforeach
                    <span class="target-time">{{$blog->created_at}}</span>
                </p>
            </a>
        @endforeach
    </div>
    {{ $blogs->links() }}
@endsection