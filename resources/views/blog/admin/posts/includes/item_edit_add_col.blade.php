@php /** @var \App\Models\BlogCategory $item */ @endphp
@if($item->exists)
    <div class="card">
        <div class="card-body">
            ID: {{ $item->id }}
        </div>
    </div>
    <br />
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label>Создано<input name="slug" type="text" value="{{ $item->created_at }}" disabled class="form-control"></label>
            </div>
            <div class="form-group">
                <label>Изменено<input name="slug" type="text" value="{{ $item->updated_at }}" disabled class="form-control"></label>
            </div>
            <div class="form-group">
                <label>Опубликовано<input name="slug" type="text" value="{{ $item->published_at }}" disabled class="form-control"></label>
            </div>
        </div>
    </div>
@endif
