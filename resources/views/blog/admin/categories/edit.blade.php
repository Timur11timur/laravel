@extends('layouts.app')

@section('content')
    <div class="container">

        @include('blog.admin.includes.errors')

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
