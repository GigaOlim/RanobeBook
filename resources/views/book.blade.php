@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="book-page">
            <div class="book-page-item">
                <div class="book-img">
                    <div class="book-page-item-name">
                    </div>
                    <div class="book-page-item-image">
                        <img src="../img/istoriya_gruppirovki_dolg.jpg" alt="">
                    </div>
                </div>
                @if(!is_null($book->volumes->first()))
                    @if(!is_null($book->volumes->first()->chapters->first()))
                        <a class="btn-read" href="{{ route('chapter.show', $book->volumes->first()->chapters->first()->id) }}">
                            Читать
                        </a>
                    @endif
                @endif
            <div class="book-info">
                <div class="book-info-item">
                    <p class="info-item__label">Тип</p>
                    <p class="info-item_title">Манхва</p>
                </div>
                <div class="book-info-item">
                    <p class="info-item__label">Год резлиза</p>
                    <p class="info-item_title">{{ $book_created_at }}</p>
                </div>
                <div class="book-info-item">
                    <p class="info-item__label">Статус тайтла</p>
                    <p class="info-item_title">Онгоинг</p>
                </div>
                <div class="book-info-item">
                    <p class="info-item__label">Статус перевода</p>
                    <p class="info-item_title">Продолжается</p>
                </div>
                <div class="book-info-item">
                    <p class="info-item__label">Автор</p>
                    <p class="info-item_title">
                    <p class="info-item_title">
                    <div class="book-auhtor"><a class="info-item_title" href="#">
                            {{ $book->author->name }}
                        </a></div>
                    </p>
                    </p>
                </div>
                <div class="book-info-item">
                    <p class="info-item__label">Издатель</p>
                    <p class="info-item_title">
                    <div class="book-publisher"><a class="info-item_title" href="#">
                            {{ $book->publisher->name }}
                        </a></div>
                    </p>
                </div>
                <div class="book-info-item">
                    <p class="info-item__label">Переводчик</p>
                    <p class="info-item_title">
                    <div class="book-translator"><a class="info-item_title"
                            href="{{ route('home.show', $book->translator->id) }}">
                            {{ $book->translator->name }}
                        </a></div>
                    </p>
                </div>
                <div class="book-info-item">
                    <p class="info-item__label">Глав</p>
                    <p class="info-item_title">{{$chapters_count}}</p>
                </div>


            </div>
        </div>
        <div class="book-text">
            <h1 class="book-info__title">{{ $book->tittle }}</h1>
            <div class="book-text-items">
                <nav class="book-nav">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all"
                            type="button" role="tab" aria-controls="nav-all"
                            aria-selected="true">Информация</button>
                        <button class="nav-link" id="nav-reading-tab" data-bs-toggle="tab" data-bs-target="#nav-reading"
                            type="button" role="tab" aria-controls="nav-link" aria-selected="false">Главы</button>
                        <button class="nav-link" id="nav-favorite-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-favorite" type="button" role="tab" aria-controls="nav-favorite"
                            aria-selected="false">Комментарии</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                        <div class="text-items-info">
                            <p class="book-description">{{ $book->description }}
                            </p>
                            <a href="#" class="book-description-link">Подробнее...</a>
                            <div class="book-tags">
                                @foreach ($book->tags as $tag)
                                    <div class="book-tag"><a href="#">
                                            {{ $tag->name }}
                                        </a></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-reading" role="tabpanel" aria-labelledby="nav-reading-tab">
                        @if (auth()->user()->id === $book->translator->id)
                            <div class="create d-flex justify-content-left" style="column-gap: 25px">
                                <h5><a class="btn btn-outline-primary my-3"
                                        href="{{ route('chapter.create', ['book' => $book]) }}">Создать
                                        главу</a></h5>
                                <h5><a class="btn btn-outline-primary my-3"
                                        href="{{ route('volume.create', ['book' => $book]) }}">Создать
                                        том</a></h5>
                            </div>
                        @endif
                        @foreach ($book->volumes as $volume)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Том: {{ $volume->name }}</h5>
                                    <p class="card-text">{{ $volume->description }}</p>
                                </div>
                                <ul class="list-group list-group-flush ">
                                    @foreach ($volume->chapters->sortBy('number') as $chapter)
                                        <li class="list-group-item"><a
                                                href="{{ route('chapter.show', $chapter->id) }}">{{ $chapter->number . ' - ' . $chapter->name }}</a>
                                            <div class="chapter-content-button">
                                                @if (auth()->user()->id === $book->translator->id)
                                                    <a
                                                        class="btn btn-outline-primary mt-3"href="{{ route('chapter.edit', ['id' => $chapter->id]) }}">Редактировать</a>
                                                    <a class="btn btn-outline-danger mt-3"
                                                        href="{{ route('chapter.destroy', ['id' => $chapter->id]) }}">Удалить</a>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>


                    <div class="tab-pane fade" id="nav-favorite" role="tabpanel" aria-labelledby="nav-favotite-tab">
                        <div class="count-review mb-3 d-flex justify-content-between align-content-center mt-1">
                            <h5>Комментарии</h5>
                            <p style="color:rgba(0, 0, 0, 0.5); font-size: 14px">Количество комментариев
                                {{ $reviews_count }}</p>
                        </div>
                        <form action="{{ route('review.store', ['book' => $book->id]) }}" method="POST">
                            @csrf
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
                                style=" min-height: 100px; max-height: 250px" rows="3"></textarea>
                            <div style="display: flex; justify-content: right; margin-top: 15px">
                                <button class="btn btn-outline-success">Отправить</button>
                            </div>
                        </form>

                        <div class="reviews mt-2">
                            @foreach ($reviews as $review)
                                <div class="reviews-content mt-2 d-flex justify-content-between align-items-center">
                                    <div class="review-content">
                                        <p class="content__text mt-1"><span class="fw-bold">Дата
                                                создания</span>:
                                            {{ $review->created_at }}</p>
                                        <p class="content__text mt-1"><span class="fw-bold">Автор</span>:
                                            {{ $review->user->name }}</p>
                                        <p class="content__text mt-2"><span class="fw-bold">Комментарий</span>:
                                            {{ $review->content }}</p>
                                        <p class="content__text mt-2"><span class="fw-bold">Оценка
                                                книги</span>:
                                            {{ $review->rate }}</p>
                                    </div>
                                    <div class="review-content-button">
                                        @if (auth()->user()->id === $review->user->id)
                                            <a
                                                class="btn btn-outline-primary mt-3"href="{{ route('review.edit', ['id' => $review->id]) }}">Редактировать</a>
                                            <a class="btn btn-outline-danger mt-3"
                                                href="{{ route('review.destroy', ['id' => $review->id]) }}">Удалить</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
