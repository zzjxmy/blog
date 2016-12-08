@extends('layouts.layout')
@section('content')
    @include('vendor.editor.head')
    @include('layouts.message')
    <div class="container background-white-color">
        <form role="form" method="post">
            {!! csrf_field() !!}
            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                <h4 for="exampleInputEmail1">标题</h4>
                <input type="text" name="title" class="form-control" value="{{old('title')?:$blog['title']}}" id="exampleInputEmail1" placeholder="标题~不超过50个字">
                @if ($errors->has('title'))
                    <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group no-margin-bottom">
                <h4 for="exampleInputPassword1">分类</h4>
            </div>
            <div class="form-group {{ $errors->has('subjects') ? ' has-error' : '' }}">
                @foreach($subjects as $subject)
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" name="subjects[]" @if(in_array($subject->id,old('subjects')?:$blogSubjects)) checked="checked" @endif value="{{$subject->id}}"> {{$subject->name}}
                    </label>
                @endforeach
                @if ($errors->has('subjects'))
                    <span class="help-block">
                        <strong>{{ $errors->first('subjects') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group no-margin-bottom">
                <h4 for="exampleInputPassword1">标签</h4>
            </div>
            <div class="form-group {{ $errors->has('tags') ? ' has-error' : '' }}">
                @foreach($tags as $tag)
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" name="tags[]" @if(in_array($tag->id,old('tags')?:$blogTags)) checked="checked" @endif value="{{$tag->id}}"> {{$tag->name}}
                    </label>
                @endforeach
                @if ($errors->has('tags'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tags') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group editor {{ $errors->has('content') ? ' has-error' : '' }}" style="width: auto;">
                <h4 for="exampleInputFile">内容</h4>
                <textarea class="form-control" rows="3" id="myEditor" name="content">{{old('content')?:$blog['content']}}</textarea>
                @if ($errors->has('content'))
                    <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-default mz-btn article-btn">修改</button>
        </form>
    </div>
@endsection