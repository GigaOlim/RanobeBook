@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="container">
            <h1>Добавить ранобэ</h1>
          </div>
          <form class="container mt-4" method="POST" action="{{route('book.store')}}" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Добавить обложку</label>
                    <input type="text" name='img' class="form-control" id="exampleFormControlInput1">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Название книги</label>
                    <input type="string" class="form-control" id="exampleFormControlInput1" placeholder="Название книги" name="title">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Переводчик</label>
                    <br>
                    {{Auth::user()->name}}
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Автор</label>
                    <select class="form-select mb-3" name="author" id="exampleFormControlInput1">
                      @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Издатель</label>
                    <select class="form-select mb-3" name="publisher" id="exampleFormControlInput1">
                      @foreach ($publishers as $publisher)
                      <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                  @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Теги</label>
                    <select class="form-select" name="tags[]" multiple aria-label="multiple select example" id="exampleFormControlTextarea1" size="9">
                      @foreach ($tags as $tag)
                          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3"><input type="submit" value="создать"></div>
                </form>
             </div>
            </div>
        </div>
    </div>
</div>
@endsection
