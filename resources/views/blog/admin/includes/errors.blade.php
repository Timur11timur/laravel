@php /** @var \Illuminate\Support\ViewErrorBag $errors */ @endphp
@if($errors->any())
    <div class="row justify-content-center">
        <div class="col">
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
                <ul>
                    @foreach($errors->all() as $oneError)
                        <li>{{ $oneError }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close position-absolute" style="top: 0.75rem; right: 1.25rem;" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif
