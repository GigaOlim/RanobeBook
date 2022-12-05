@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Личный кабинет') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="row">
                            <div class="col-4">
                                <div class="card">
                                    <div class="image">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $user->name }}</h5>
                                        @foreach ($user->roles as $role)
                                            <h6 class="card-subtitle mb-2 text-muted">
                                                {{ $role->name }}
                                            </h6>
                                        @endforeach
                                        @if ($user->id === auth()->user()->id)
                                        <div class="setting-account">
                                            <a class="setting link-settting" href="{{ route('user.edit', $user->id) }}">Настройки</a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                  <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                      <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="true">Все</button>
                                      <button class="nav-link" id="nav-reading-tab" data-bs-toggle="tab" data-bs-target="#nav-reading" type="button" role="tab" aria-controls="nav-reading" aria-selected="false">Читаю</button>
                                      <button class="nav-link" id="nav-favorite-tab" data-bs-toggle="tab" data-bs-target="#nav-favorite" type="button" role="tab" aria-controls="nav-favorite" aria-selected="false">Любимые</button>
                                      <button class="nav-link" id="nav-done-tab" data-bs-toggle="tab" data-bs-target="#nav-done" type="button" role="tab" aria-controls="nav-done" aria-selected="false">Прочитанные</button>
                                    </div>
                                  </nav>
                                  <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">Манга вся</div>
                                    <div class="tab-pane fade" id="nav-reading" role="tabpanel" aria-labelledby="nav-reading-tab">Читаемое</div>
                                    <div class="tab-pane fade" id="nav-favorite" role="tabpanel" aria-labelledby="nav-favotite-tab">Любимое</div>                                    <div class="tab-pane fade" id="nav-done" role="tabpanel" aria-labelledby="nav-done-tab">Прочитанное</div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
