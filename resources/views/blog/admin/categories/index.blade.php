@extends('layouts.app')

@section('content')
    <div class="container">

        @include('blog.admin.includes.success')

        @include('blog.admin.includes.errors')

        <div class="row justify-content-center">
            <div class="col">
                <nav class="navbar navbar-toggleable navbar-light bg-faded">
                    <a href="{{ route('blog.admin.categories.create') }}" class="btn btn-primary">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Категория</th>
                                <th>Родитель</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                @php /** @var \App\Models\BlogCategory $item */ @endphp
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <a href="{{ route('blog.admin.categories.edit', $item->id) }}">
                                            {{ $item->title }}
                                        </a>
                                    </td>
                                    <td @if (in_array($item->parent_id, [0,1])) style="color: #ccc;" @endif>
                                        {{-- $item->parentCategory->title ?? '?' --}}
                                        {{-- optional($item->parentCategory)->title --}}
                                        {{-- $item->parent_title --}}
                                        {{ $item->parentTitle }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($items->total() > $items->count())
            <br>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            {{ $items->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
