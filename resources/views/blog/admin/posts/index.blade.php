@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('success'))
            <div class="row justify-content-center">
                <div class="col">
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif

            <div class="row justify-content-center">
                <div class="col">
                    <nav class="navbar navbar-toggleable navbar-light bg-faded">
                        <a href="{{ route('blog.admin.posts.create') }}" class="btn btn-primary">Написать</a>
                    </nav>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Автор</th>
                                    <th>Категория</th>
                                    <th>Заголовок</th>
                                    <th>Дата публикации</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($paginator as $item)
                                    @php /** @var \App\Models\BlogPost $item */ @endphp
                                    <tr @if(!$item->is_published) style="background-color: #ccc;" @endif>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->category->title }}</td>
                                        <td>
                                            <a href="{{ route('blog.admin.posts.edit', $item->id) }}">
                                                {{ $item->title }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d.M H:i') : '' }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @if($paginator->total() > $paginator->count())
                <br>
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                {{ $paginator->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
    </div>
@endsection
