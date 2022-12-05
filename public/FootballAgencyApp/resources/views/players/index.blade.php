@extends('layouts.players')

@section('content')
    <form method="GET" action="{{ route('players.search') }}" class="d-flex recipe__search" role="search">
        <input name="search" class="form-control me-2" id="inputSearch" type="search" placeholder="Поиск" aria-label="Поиск">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
    </form>
    <h2 class="title__agent mt-3">Игроки</h1>
    <div class="main__cards d-flex mt-2 flex-wrap" style="column-gap: 25px; row-gap: 25px">
        @foreach ($players as $player)
            <div class="main__card">
                <img class="main__card__img" src="{{ asset('img/userimage/' . $player->users->photoPath) }}" alt="">
                <h3 class="main__card__title">{{ $player->users->name }} {{ $player->users->surname }}</h3>
                <p class="main__card__country">Страна: {{ $player->users->country->name }}</p>
                <p class="main__card__country">Клуб: {{ $player->club->name }}</p>
                <a href="{{ route('players.info', ['id' => $player->id]) }}" class="btn btn-success" style="margin-top: 10px">Подробнее</a>
            </div>
        @endforeach

    </div>
@endsection
