@extends('layouts.layout')
@section('content')
    <form role="form">
        <div class="form-group">
            <label for="exampleInputEmail1">标题</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">分类</label>
            <select class="form-control">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>
        <div class="form-group no-margin-bottom">
            <label for="exampleInputPassword1">标签</label>
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
        <div class="form-group editor" style="width: auto">
            <label for="exampleInputFile">内容</label>
            <textarea class="form-control " rows="3" id="myEditor"></textarea>
        </div>
        <button type="submit" class="btn btn-default">发布</button>
    </form>
@endsection