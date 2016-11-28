@if(session('success'))
    <div class="alert alert-success alert-dismissible container" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Success!</strong> {{session('success')}}.
    </div>
@elseif(session('error'))
    <div class="alert alert-danger alert-dismissible container" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Error!</strong> {{session('error')}}.
    </div>
@endif