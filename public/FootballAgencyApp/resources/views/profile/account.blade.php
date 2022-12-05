@extends('layouts.app')

@section('content')
<div class="container">
    <div class="main-body">

          <div class="row gutters-sm">
            @include('layouts.dev.infoUser')
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Полное имя</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $user->name }} {{ $user->surname }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $user->email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Номер телефона</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $user->phone_number }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Возраст</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $years }} года
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Страна</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $user->country->name }}
                    </div>
                  </div>
                  @if($user->player != Null)
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Клуб</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $user->player->club->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Статус игрока</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $user->player->status->name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Трансферная стоимость</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $user->player->transfer_price }} $
                    </div>
                  </div>
                  @endif
                </div>
              </div>
            </div>
            @if($user->agent != Null)
            <div class="col-md-8" style="width: 100%">
                <div class="card mb-3">
                   <div class="card-body">
                    <section class="intro">
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
                                              <th scope="col">Дата рождения</th>
                                              <th scope="col">Статус</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach ($user->agent->player as $players)
                                            <tr>
                                                <td>{{ $players->id }}</td>
                                                <td>{{ $players->users->name }} {{ $players->users->surname }}</td>
                                                <td>{{ $players->club->name }}</td>
                                                <td>{{ $players->users->date_birth }}</td>
                                                <td>{{ $players->status->name }}</td>
                                                <td><a href="{{ route('players.info', ['id' => $players->id]) }}" class="text-success">Открыть</a></td>
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
          </div>
          @endif

        </div>
    </div>
</div>
@endsection
