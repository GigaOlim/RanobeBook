@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <h1>Добавить издателя</h1>
                </div>
                <form class="container mt-4" method="POST" action="{{ route('publisher.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Наименование издателя</label>
                        <input type="text" name='name' class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Описание</label>
                        <input type="string" class="form-control" id="exampleFormControlInput1" placeholder="Описание"
                            name="description">
                    </div>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </form>
            </div>
        </div>
    </div>
@endsection
