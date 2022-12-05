@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <h1>Добавить том</h1>
                </div>
                <form class="container mt-4" method="POST" action="{{ route('volume.store', ['book' => $book]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Название тома</label>
                        <input type="text" name='name' class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Описание тома</label>
                        <input type="string" class="form-control" id="exampleFormControlInput1" placeholder="Описание"
                            name="description">
                    </div>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </form>
            </div>
        </div>
    </div>
@endsection
