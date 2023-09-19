<div class="col-12">
    @if(session('success'))
        <div class="alert alert-default-success text-center">
            {{session('success')}}
        </div>
    @elseif(session('error'))
        <div class="alert alert-default-danger text-center">
            {{session('error')}}
        </div>
    @endif
</div>
