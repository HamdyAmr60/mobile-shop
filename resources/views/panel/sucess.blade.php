
@if (session()->has("sucess"))
    
<div class="alert alert-success" role="alert">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Well done!</strong> {{session->get("sucess")}}.
</div>
@endif