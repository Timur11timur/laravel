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

        @if(session('success'))
            <div class="row justify-content-center">
                <div class="col">
                    <div class="alert alert-successj" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        @php /** @var \App\Models\BlogCategory $item */ @endphp
        <form method="POST" action="{{ route('blog.admin.categories.update', $item->id) }}">
            <div class="row justify-content-center">
                @method('PATCH')
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
