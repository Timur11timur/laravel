@php
     /** @var \App\Models\BlogCategory $item */
    /** @var \Illuminate\Support\Collection $categoryList */
@endphp
<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Заголовок<input name="title" type="text" value="{{old('title', $item->title) }}" required class="form-control" size="50"></label>
                </div>
                <div class="form-group">
                    <label>Идентификатор<input name="slug" type="text" value="{{ old('slug', $item->slug) }}" required class="form-control" size="50"></label>
                </div>
                <div class="form-group">
                    <label>Родитель
                        <select name="parent_id" class="form-control" required class="form-control">
                            @foreach($categoryList as $categoryOption)
                                <option value="{{ $categoryOption->id }}"
                                        @if($categoryOption->id == $item->parent_id) selected @endif>
                                    {{ $categoryOption->id }} . {{ $categoryOption->title }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="form-group">
                    <label>Описание<textarea name="description" class="form-control" cols="50" rows="5">{{ old('description', $item->description) }}</textarea></label>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <a href="{{ route('blog.admin.categories.index') }}" class="btn btn-secondary mr-2">Назад</a>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</div>
