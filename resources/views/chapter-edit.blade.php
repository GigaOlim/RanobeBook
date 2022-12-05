@extends('layouts.app')

@section('content')
    <form class="container" action="{{ route('chapter.update', ['id' => $chapter->id]) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Наименование главы</label>
            <input type="text" name='name' value="{{ $chapter->name }}" class="form-control" id="exampleFormControlInput1">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="card p-3 mb-3">
            <div class="mb-3">
                <label for="formFile" class="form-label">Выберите файл</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <div>
                <label for="exampleFormControlInput1" class="form-label">Или укажите содержимое главы
                    здесь</label>
                <textarea class="form-control"  id="editor-body" rows="3" name="content"> {{ $chapter->content }} </textarea>
                @error('content')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
