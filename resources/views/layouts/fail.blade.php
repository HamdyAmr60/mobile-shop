
@if (session()->has("fail"))
    
<div class="alert alert-danger" role="alert">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Bad request!</strong> {{session()->get("fail")}}.
</div>
@endif