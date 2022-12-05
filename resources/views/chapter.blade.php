@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <h1 class="card-title d-flex justify-content-center">{{ $chapter->name }}</h1>
                </div>
                <div class="card col-mb-8 mt-4" style="width: 100%;">
                    <div class="card-body">
                        <p class="card-text">{!! $chapter->content !!}</p>
                    </div>
                </div>
            </div>
            <div class=" buttons d-flex justify-content-around mt-3">
                @if ($isFirst == 'true')
                    <a href="{{ route('book.show', $chapter->volume->book->id) }}" class="btn btn-outline-warning ">К
                        книге</a>
                @elseif ($before != null)
                    <a href="{{ route('chapter.show', $before) }}" class="btn btn-outline-dark">Назад</a>
                @endif
                @if ($isLast == 'true')
                    <a href="{{ route('book.show', $chapter->volume->book->id) }}" class="btn btn-outline-warning">К
                        книге</a>
                @elseif ($next != null)
                    <a href="{{ route('chapter.show', $next) }}" class="btn btn-outline-dark">Вперед</a>
                @endif
            </div>
        </div>
    </div>
@endsection
