
@if ($errors->any())
    @foreach ( $errors->all() as $error)
        
    <div class="alert alert-danger" role="alert">
        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>BAD</strong> {{$error}}.
    </div>
    @endforeach
@endif