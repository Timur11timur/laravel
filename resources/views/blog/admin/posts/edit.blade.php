@extends('layouts.app')

@section('content')
    <div class="container">
        @php /** @var \Illuminate\Support\ViewErrorBag $errors */ @endphp
        @if($errors->any())
            <div class="row justify-content-center">
                <div class="col">
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first() }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        @php /** @var \App\Models\BlogPost $item */ @endphp

        @if($item->exists)
            <form method="POST" action="{{ route('blog.admin.posts.update', $item->id) }}">
                @method('PATCH')
        @else
            <form method="POST" action="{{ route('blog.admin.posts.store') }}">
        @endif

            <div class="row justify-content-center">
                @csrf
                <div class="col-8">
                    @include('blog.admin.posts.includes.item_edit_main_col')
                </div>
                <div class="col-3">
                    @include('blog.admin.posts.includes.item_edit_add_col')
                </div>
            </div>
        </form>

        @if($item->exists)
            <div class="row justify-content-end fixed-bottom">
                <div class="col-1">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('blog.admin.posts.destroy', $item->id) }}" class=" d-flex justify-content-center">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-primary">Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
