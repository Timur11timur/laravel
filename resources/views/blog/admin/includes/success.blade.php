@if(session('success'))
    <div class="row justify-content-center">
        <div class="col">
            <div class="alert alert-success" role="alert">
                {!! session()->get('success') !!}
                <button type="button" class="close position-absolute" style="top: 0.75rem; right: 1.25rem;" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif
