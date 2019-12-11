@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('blog.admin.categories.update', $item->id) }}">
            <div class="row justify-content-center">
                @php /** @var \App\Models\BlogCategory $item */ @endphp
                    @method('PATCH')
                    @csrf
                    <div class="col-8">
                        @include('blog.admin.category.includes.item_edit_main_col')
                    </div>
                    <div class="col-3">
                        @include('blog.admin.category.includes.item_edit_add_col')
                    </div>
            </div>
        </form>
    </div>
@endsection
