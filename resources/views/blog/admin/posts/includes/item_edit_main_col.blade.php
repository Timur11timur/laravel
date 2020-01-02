@php
     /** @var \App\Models\BlogCategory $item */
    /** @var \Illuminate\Support\Collection $categoryList */
@endphp
<div class="row justify-content-center">
    <div class="col">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-body">
                <div class="nav nav-tabs mb-3" role="tablist">
                    <a class="nav-item nav-link active" href="#main-tab-data"  role="tab" data-toggle="pill" >Основные данные</a>
                    <a class="nav-item nav-link" href="#additional-tab-data" role="tab" data-toggle="pill" >Дополнительные данные</a>
                </div>
                <div class="tab-content">
                    <div id="main-tab-data" class="tab-pane fade show active" role="tabpanel">
                        <div class="form-group">
                            <label class="col">Заголовок<input name="title" type="text" value="{{old('title', $item->title) }}" required class="form-control" size="50"></label>
                        </div>
                        <div class="form-group">
                            <label class="col">Статья<textarea name="content_raw" type="text" required class="form-control" rows="20">{{ old('content_raw', $item->content_raw) }}</textarea></label>
                        </div>
                    </div>
                    <div id="additional-tab-data" class="tab-pane fade" role="tabpanel">
                        <div class="form-group">
                            <label class="col">Категория
                                <select name="category_id" class="form-control" required class="form-control">
                                    @foreach($categoryList as $categoryOption)
                                        <option value="{{ $categoryOption->id }}"
                                                @if($categoryOption->id == $item->category_id) selected @endif>
                                            {{ $categoryOption->id_title }}
                                        </option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="col">Slug<input name="slug" class="form-control" size="50" value="{{old('slug', $item->slug) }}" ></label>
                        </div>
                        <div class="form-group">
                            <label class="col">Выдержка<textarea name="excerpt" class="form-control" rows="5">{{ old('excerpt', $item->excerpt) }}</textarea></label>
                        </div>
                        <div class="form-check">
                            <label class="col"><input name="is_published" type="checkbox" class="form-check-input" value="yes"
                                @if($item->is_published)
                                    checked="checked"
                                @endif
                            >Опубликовано</label>
                        </div>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <a href="{{ route('blog.admin.posts.index') }}" class="btn btn-secondary mr-2">Назад</a>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</div>
