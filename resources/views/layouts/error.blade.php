@if (count($errors) > 0)
    <fieldset class="layui-elem-field has-error">
        <legend style="color:#FF5722">Error</legend>
        <div class="layui-field-box" style="color:#FF5722">
            {{$errors->first()}}
        </div>
    </fieldset>
@endif