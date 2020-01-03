@extends('layouts.app')

@section('content')
    <div class="container">
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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        @php /** @var \App\Models\BlogCategory $item */ @endphp

        @if($item->exists)
            <form method="POST" action="{{ route('blog.admin.categories.update', $item->id) }}">
                @method('PATCH')
        @else
            <form method="POST" action="{{ route('blog.admin.categories.store') }}">
        @endif

            <div class="row justify-content-center">
                @csrf
                <div class="col-8">
                    @include('blog.admin.categories.includes.item_edit_main_col')
                </div>
                <div class="col-3">
                    @include('blog.admin.categories.includes.item_edit_add_col')
                </div>
            </div>
        </form>
    </div>
@endsection
