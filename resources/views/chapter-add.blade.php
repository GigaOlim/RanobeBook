@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <h1>Добавить главу</h1>
                </div>
                <form class="container mt-4" method="POST" action="{{ route('chapter.store',['book' => $book]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Номер главы</label>
                        <input type="number" name='number' class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Наименование главы</label>
                        <input type="text" name='name' class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Выбор тома</label>
                        <select class="form-select mb-3" name="volume" id="exampleFormControlInput1">
                            <option selected>Выбрать том</option>
                            @php
                                $count = 1;
                            @endphp

                            @foreach ($volume as $volume)
                                <option value="{{ $volume->id }}">{{ $count }}</option>
                                @php
                                    $count++;
                                @endphp
                            @endforeach
                        </select>

                    </div>
                    <div class="card p-3 mb-3">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Выберите файл</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        <div>
                            <label for="exampleFormControlInput1" class="form-label">Или укажите содержимое главы
                                здесь</label>
                            <textarea class="form-control" id="summernote" rows="3" name="content"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </form>
            </div>
        </div>
    </div>
@endsection
