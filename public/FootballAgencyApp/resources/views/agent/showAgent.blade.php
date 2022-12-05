@extends('layouts.agent')

@section('content')
<div class="container">
    <div class="main-body">
       <div class="row gutters-sm">
            <a href="{{ url()->previous() }}" class="mb-2">Назад</a>
          <div class="col-md-4 mb-3">
             <div class="card">
                <div class="card-body">
                   <div class="d-flex flex-column align-items-center text-center">
                      <img src="{{ asset('img/userimage/' . $agent->user->photoPath) }}" alt="Admin" class="rounded-circle img-user">
                      <div class="mt-3">
                         <h4></h4>
                         <p class="text-secondary mb-1">Агент</p>
                         <p class="text-muted font-size-sm">{{ $agent->user->name }} {{ $agent->user->surname }}</p>
                      </div>
                   </div>
                </div>
             </div>
             <div class="card mt-3">
                <ul class="list-group list-group-flush">
                   <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                         </svg>
                         Instagram
                      </h6>
                      <span class="text-secondary">_isaev321</span>
                   </li>
                </ul>
             </div>
          </div>
          <div class="col-md-8">
             <div class="card mb-3">
                <div class="card-body">
                   <div class="row">
                      <div class="col-sm-3">
                         <h6 class="mb-0">Полное имя</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ $agent->user->name }} {{ $agent->user->surname }}
                      </div>
                   </div>
                   <hr>
                   <div class="row">
                      <div class="col-sm-3">
                         <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ $agent->user->email }}
                      </div>
                   </div>
                   <hr>
                   <div class="row">
                      <div class="col-sm-3">
                         <h6 class="mb-0">Номер телефона</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ $agent->user->phone_number }}
                      </div>
                   </div>
                   <hr>
                   <div class="row">
                      <div class="col-sm-3">
                         <h6 class="mb-0">Страна</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ $agent->user->country->name }}
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
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
                                    @foreach ($agent->player as $player)
                                    <tr>
                                        <td>{{ $player->id }}</td>
                                        <td>{{ $player->users->name }} {{ $player->users->surname }}</td>
                                        <td>{{ $player->club->name }}</td>
                                        <td>{{ $player->users->date_birth }}</td>
                                        <td>{{ $player->status->name }}</td>
                                        <td><a href="{{ route('players.info', ['id' => $player->id]) }}" class="text-success">Открыть</a></td>
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
 </div>


@endsection
