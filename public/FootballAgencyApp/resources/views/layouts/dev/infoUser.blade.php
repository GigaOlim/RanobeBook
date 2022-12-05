<div class="col-md-4 mb-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
          <img src="{{ asset('img/userimage/' . $user->photoPath) }}" alt="Admin" class="rounded-circle img-user">
          <div class="mt-3">
            <h4>{{ $user->name }} {{ $user->surname }}</h4>
            @if($user->agent != Null)
                <p class="text-secondary mb-1">Агент</p>
            @elseif ($user->player != Null)
                <p class="text-secondary mb-1">Игрок</p>
            @elseif(Auth::user()->isAdmin() || Auth::user()->isModer())
                <p class="text-secondary mb-1">{{ $user->roles->name }}</p>
            @else
                <p class="text-secondary mb-1">Пользователь</p>
            @endif
                <p class="text-muted font-size-sm">{{ $user->country->name }}</p>
          </div>
          @if (session('status'))
              <div class="alert alert-success alert-info" role="alert">
                  {{ session('status') }}
              </div>
              @endif
        @if(session('error'))
             <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
