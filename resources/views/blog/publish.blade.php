@extends('layouts.layout')
@section('content')
    @include('vendor.editor.head')
    <form role="form">
        <div class="form-group">
            <h4 for="exampleInputEmail1">标题</h4>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="标题~不超过50个字">
        </div>
        <div class="form-group no-margin-bottom">
            <h4 for="exampleInputPassword1">分类</h4>
        </div>
        <div class="form-group">
            <div class="">
                @foreach($subjects as $subject)
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="{{$subject->id}}"> {{$subject->name}}
                    </label>
                @endforeach
            </div>
        </div>
        <div class="form-group no-margin-bottom">
            <h4 for="exampleInputPassword1">标签</h4>
        </div>
        <div class="form-group">
            <div class="">
                @foreach($tags as $tag)
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="{{$tag->id}}"> {{$tag->name}}
                    </label>
                @endforeach
            </div>
        </div>
        <div class="form-group editor" style="width: auto;">
            <h4 for="exampleInputFile">内容</h4>
            <textarea class="form-control " rows="3" id="myEditor" style="height: 300px;"></textarea>
        </div>
        <button type="submit" class="btn btn-default">发布</button>
    </form>
@endsection