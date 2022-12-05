@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
              <h1>Добавить тэг</h1>
            </div>
            <form class="container mt-4" method="POST" action="{{route('tag.store')}}" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Название тега</label>
                    <input type="text" name='name' class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Описание</label>
                    <input type="text" name='description' class="form-control">
                  </div>
                  <div class="mb-3"><input type="submit" value="создать"></div>
                </form>
             </div>
            </div>
        </div>
    </div>
</div>
@endsection
