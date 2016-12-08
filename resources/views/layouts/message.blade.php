@if(session('success'))
    <fieldset class="layui-elem-field">
        <legend style="color:#5FB878">Success</legend>
        <div class="layui-field-box" style="color:#5FB878">
            {{session('success')}}.
        </div>
    </fieldset>
@elseif(session('error'))
    <fieldset class="layui-elem-field">
        <legend style="color:#FF5722">Error</legend>
        <div class="layui-field-box" style="color:#5FB878">
            {{session('error')}}.
        </div>
    </fieldset>
@endif