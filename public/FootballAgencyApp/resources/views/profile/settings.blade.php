@extends('layouts.app')

@section('content')
<div class="container">
    <div class="main-body">

          <div class="row gutters-sm">
            @include('layouts.dev.infoUser')
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                    <h4>Смена пароля</h3>
                        <form method="POST" action="{{ route('profile.changePassword') }}">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                              <label for="oldpassword" class="form-label">Введите старый пароль</label>
                              <input type="password" name="old_password" class="form-control" id="oldpassword" aria-describedby="emailHelp">
                              @error('old_password')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="password" class="form-label">Введите новый пароль</label>
                              <input type="password" name="password" class="form-control" id="password">
                              @error('password')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="password_confirmation" class="form-label">Повторите пароль</label>
                              <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                            </div>
                            <button type="submit" style="margin-left: 0" class="btn btn-primary">Изменить</button>
                        </form>
                </div>
                <div class="card-body">
                    <h4>Смена личной информации</h3>
                        <form action="{{ route('profile.changeUserInfo') }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                              <label for="password" class="form-label">Введите пароль</label>
                              <input type="password" name="password" class="form-control" id="password">
                              @error('password')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="surname" class="form-label">Введите новую Фамилию</label>
                              <input type="text" name="surname" class="form-control" id="surname">
                                @error('surname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                              <label for="name" class="form-label">Введите новое Имя</label>
                              <input type="text" name="name" class="form-control" id="name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" style="margin-left: 0" class="btn btn-primary">Изменить</button>
                        </form>
                </div>
                <div class="card-body">
                    <h4>Добавить | Изменить картинку</h3>
                        <form method="POST" enctype="multipart/form-data" action="{{ route('profile.addImage') }}">
                            @csrf
                            <div class="mb-3">
                              <label for="file" class="form-label">Вставьте картинку</label>
                              <input type="file" name="file" class="form-control" id="file">
                              @error('file')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" style="margin-left: 0" class="btn btn-primary">Изменить</button>
                        </form>
                </div>
              </div>





            </div>
          </div>

        </div>
    </div>

@endsection
