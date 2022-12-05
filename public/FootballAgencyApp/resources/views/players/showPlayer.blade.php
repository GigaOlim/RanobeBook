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
                      <img src="{{ asset('img/userimage/' . $player->users->photoPath) }}" alt="Admin" class="rounded-circle img-user">
                      <div class="mt-3">
                         <h4></h4>
                         <p class="text-secondary mb-1">Игрок</p>
                         <p class="text-muted font-size-sm">{{ $player->users->name }} {{ $player->users->surname }}</p>
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
                        {{ $player->users->name }} {{ $player->users->surname }}
                      </div>
                   </div>
                   <hr>
                   <div class="row">
                      <div class="col-sm-3">
                         <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                         {{ $player->users->email }}
                      </div>
                   </div>
                   <hr>
                   <div class="row">
                      <div class="col-sm-3">
                         <h6 class="mb-0">Страна</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                         {{ $player->users->country->name }}
                      </div>
                   </div>
                   <hr>
                   <div class="row">
                      <div class="col-sm-3">
                         <h6 class="mb-0">Трансферная стоимость</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                         {{ $player->transfer_price}}
                      </div>
                   </div>
                   <hr>
                   <div class="row">
                      <div class="col-sm-3">
                         <h6 class="mb-0">Агент</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                         <a href="{{ route('agent.info', ['id' => $player->agent->user->id]) }}">{{ $player->agent->user->name }} {{ $player->agent->user->surname }}</a>
                      </div>
                   </div>
                   <hr>
                   <div class="row">
                      <div class="col-sm-3">
                         <h6 class="mb-0">Статус</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                         {{ $player->status->name }}
                      </div>
                   </div>
                   <hr>
                   <div class="row">
                      <div class="col-sm-3">
                         <h6 class="mb-0">Клуб</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                         {{ $player->club->name }}
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@endsection
