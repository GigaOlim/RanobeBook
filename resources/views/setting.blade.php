@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <form method="GET" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Имя</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                aria-describedby="emailHelp" value="{{ $user->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Почта</label>
                            <input type="email" class="form-control" name="email" id="exampleInputPassword1"
                                value="{{ $user->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Пароль</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Изменить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
