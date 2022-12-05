@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="main-body">

          <div class="row gutters-sm">
            @include('layouts.dev.infoUser')
            @if(Auth::user()->isAdmin())
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>Выдача прав</h3>
                            <form method="POST" action="{{ route('admin.addRole') }}">
                                @csrf
                                <div class="mb-3">
                                  <select name="user_id" class="form-select mt-2"  aria-label="Default select example">
                                    <option selected>Выберите пользователя</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
                                    @endforeach

                                  </select>
                                  @error('user')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                    <select name="role_id" class="form-select mt-2"  aria-label="Default select example">
                                        <option selected>Выберите роль</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <button type="submit" style="margin-left: 0" class="btn btn-primary">Изменить</button>
                            </form>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-8" style="width: 100%">
                <div class="card mb-3">
                   <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 style="padding-left: 24px; padding-bottom: 15px">Игроки</h5>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddPlayers" class="btn btn-outline-success">Добавить игрока</a>
                    </div>
                    <section class="intro table-admin">
                        <div class="bg-image h-100" style="">
                          <div class=" d-flex align-items-center h-100">
                            <div class="container">
                              <div class="row justify-content-center">
                                <div class="col-12">
                                  <div class="card shadow-2-strong" >
                                    <div class="card-body">
                                      <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">ФИО</th>
                                              <th scope="col">Клуб</th>
                                              <th scope="col">Агент</th>
                                              <th scope="col">Дата рождения</th>
                                              <th scope="col">Статус</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($players as $player)
                                                <tr>
                                                    <td>{{ $player->id }}</td>
                                                    <td>{{ $player->users->name }} {{ $player->users->surname }}</td>
                                                    <td>{{ $player->club->name }}</td>
                                                    <td><a href="{{ route('agent.info', ['id' => $player->agent_id]) }}" class="text-info">{{ $player->agent->user->name }} {{ $player->agent->user->surname }}</a></td>
                                                    <td>{{ $player->users->date_birth }}</td>
                                                    <td>{{ $player->status->name }}</td>
                                                    <td><a href="{{ route('players.info', ['id' => $player->id]) }}" class="text-success">Открыть</a><a href="{{ route('admin.destroyPlayer', ['id' => $player->id]) }}" style="margin-left: 15px" class="text-danger">Удалить</a></td>
                                                </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                   </div>
                </div>
            </div>
            <div class="col-md-8" style="width: 100%">
                <div class="card mb-3">
                   <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 style="padding-left: 24px; padding-bottom: 15px">Агенты</h5>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddAgent" class="btn btn-outline-success">Добавить агента</a>
                    </div>
                    <section class="intro table-admin">
                        <div class="bg-image h-100" style="">
                          <div class=" d-flex align-items-center h-100">
                            <div class="container">
                              <div class="row justify-content-center">
                                <div class="col-12">
                                  <div class="card shadow-2-strong" >
                                    <div class="card-body">
                                      <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">ФИО</th>
                                              <th scope="col">Дата рождения</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($agents as $agent)
                                                <tr>
                                                    <td>{{ $agent->id }}</td>
                                                    <td>{{ $agent->user->name }} {{ $agent->user->surname }}</td>
                                                    <td>{{ $agent->user->date_birth }}</td>
                                                    <td><a href="{{ route('agent.info', ['id' => $agent->id]) }}" class="text-success">Открыть</a></td>
                                                </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                   </div>
                </div>
            </div>
            <div class="col-md-8" style="width: 100%">
                <div class="card mb-3">
                   <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 style="padding-left: 24px; padding-bottom: 15px">Клубы</h5>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddClub" class="btn btn-outline-success">Добавить клуб</a>
                    </div>
                    <section class="intro table-admin">
                        <div class="bg-image h-100" style="">
                          <div class=" d-flex align-items-center h-100">
                            <div class="container">
                              <div class="row justify-content-center">
                                <div class="col-12">
                                  <div class="card shadow-2-strong" >
                                    <div class="card-body">
                                      <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Название клуба</th>
                                              <th scope="col">Страна</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($club as $val)
                                                <tr>
                                                    <td>{{ $val->id }}</td>
                                                    <td>{{ $val->name }}</td>
                                                    <td>{{ $val->country->name }}</td>
                                                </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                   </div>
                </div>
            </div>
            @if(Auth::user()->isAdmin())
            <div class="col-md-8" style="width: 100%">
                <div class="card mb-3">
                   <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 style="padding-left: 24px; padding-bottom: 15px">Сотрудники</h5>
                    </div>
                    <section class="intro table-admin">
                        <div class="bg-image h-100" style="">
                          <div class=" d-flex align-items-center h-100">
                            <div class="container">
                              <div class="row justify-content-center">
                                <div class="col-12">
                                  <div class="card shadow-2-strong" >
                                    <div class="card-body">
                                      <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">ФИО</th>
                                              <th scope="col">Роль</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($employees as $employee)
                                                <tr>
                                                    <td>{{ $employee->id }}</td>
                                                    <td>{{ $employee->name }} {{ $employee->surname }}</td>
                                                    <td>{{ $employee->roles->name}}</td>
                                                </tr>
                                            @endforeach
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                   </div>
                </div>
            </div>
            @endif
          </div>

        </div>
    </div>

</div>

@include('layouts.dev.modalAddPlayers')
@include('layouts.dev.modalAddAgent')
@include('layouts.dev.modalAddClub')



@endsection
