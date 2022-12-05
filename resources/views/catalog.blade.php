@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="name">Каталог книг</h3>
            <div class="ranobe-book">
                @foreach ($books as $book)
                    <a class="card book" href="{{ route('book.show', ['book' => $book->id]) }}" style="width: 18rem;">
                        <img src="img/istoriya_gruppirovki_dolg.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-text">{{ $book->tittle }}</h5>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
