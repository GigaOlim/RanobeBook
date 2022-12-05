@extends('layouts.app')

@section('content')
<form class="container" action="{{ route('review.update', ['id' => $review->id]) }}" method="POST">
    @csrf
    @method('put')
    <select name="rate" class="form-select" aria-label="Default select example">
        <option selected>Выбрать рейтинг</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <label for="exampleFormControlTextarea1" class="form-label">
        <h6>Описание</h6>
    </label>
    <textarea class="form-control" name="content" id="exampleFormControlTextarea1"
        style=" min-height: 100px; max-height: 250px" rows="3">{{ $review->content }}</textarea>
    <div style="display: flex; justify-content: right; margin-top: 15px">
        <button class="btn btn-outline-success">Отправить</button>
    </div>
</form>
@endsection
