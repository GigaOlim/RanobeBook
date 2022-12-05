@extends('layouts.agent')

@section('content')
    <form method="GET" class="d-flex recipe__search" action="{{ route('agent.search') }}" role="search">
        <input class="form-control me-2" id="inputSearch" type="search" name="search" placeholder="Поиск" aria-label="Поиск">
        <button class="btn btn-outline-success" type="submit">Поиск</button>
    </form>
    <h2 class="title__agent mt-3">Агенты</h1>
    <div class="main__cards d-flex mt-2 flex-wrap" style="column-gap: 25px; row-gap: 25px">
        @foreach ($agents as $agent)
            <div class="main__card">
                <img class="main__card__img" src="{{ asset('img/userimage/' . $agent->user->photoPath) }}" alt="">
                <h3 class="main__card__title">{{ $agent->user->name }}</h3>
                <p class="main__card__country">Страна: {{ $agent->user->country->name }}</p>
                <p class="main__card__number">Номер телефона: {{ $agent->user->phone_number }}</p>
                <a href="{{ route('agent.info', ['id' => $agent->id]) }}" class="btn btn-success" style="margin-top: 10px">Подробнее</a>
            </div>
        @endforeach
    </div>
@endsection
