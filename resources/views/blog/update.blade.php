@extends('layouts.layout')
@section('content')
    @include('vendor.editor.head')
    <div class="container background-white-color padding-md">
        @include('layouts.message')
        @include('layouts.error')
        <form class="layui-form" action="" method="post">
            {{csrf_field()}}
            <div class="layui-form-item">
                <label class="layui-form-label">标题</label>
                <div class="layui-input-block">
                    <input type="text" name="title" placeholder="请输入标题" value="{{old('title')?:$blog['title']}}" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">分类</label>
                <div class="layui-input-block">
                    @foreach($subjects as $subject)
                        <input type="checkbox" name="subjects[]" @if(in_array($subject->id,old('subjects')?:$blogSubjects)) checked="checked" @endif value="{{$subject->id}}" title="{{$subject->name}}">
                    @endforeach
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">标签</label>
                <div class="layui-input-block">
                    @foreach($tags as $tag)
                        <input type="checkbox" name="tags[]" @if(in_array($tag->id,old('tags')?:$blogTags)) checked="checked" @endif value="{{$tag->id}}" title="{{$tag->name}}">
                    @endforeach
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label">内容</label>
                <div class="layui-input-block editor">
                    <textarea name="content" id="myEditor" placeholder="请输入内容" class="layui-textarea">{{old('content')?:$blog['content']}}</textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
    </div>
@endsection