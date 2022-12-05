<div class="modal fade" id="modalAddPlayers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить игрока</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.addPlayer') }}" method="POST" >
            @csrf
            <div class="mb-2">
              <label for="users" class="col-form-label">Выберите пользователя:</label>
              <div class="mb-3">
                <select name="user" class="form-select mt-2" id="users"  aria-label="Default select example">
                  <option selected>Выберите пользователя</option>
                  @foreach ($usersAgents as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} {{ $user->surname }}</option>
                  @endforeach
                </select>
                @error('user')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="mb-2">
              <label for="agents" class="col-form-label">Выберите Агента:</label>
              <div class="mb-3">
                <select name="agent" class="form-select mt-2" id="agents"  aria-label="Default select example">
                  <option selected>Выберите агента</option>
                  @foreach ($agents as $agent)
                    <option value="{{ $agent->id }}">{{ $agent->user->name }} {{ $agent->user->surname }}</option>
                  @endforeach
                </select>
                @error('user')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="mb-2">
              <label for="club" class="col-form-label">Выберите Клуб:</label>
              <div class="mb-3">
                <select name="club" class="form-select mt-2" id="club"  aria-label="Default select example">
                  <option selected>Выберите клуб</option>
                  @foreach ($club as $val)
                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                  @endforeach
                </select>
                @error('user')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="mb-2">
              <label for="status" class="col-form-label">Выберите Статус:</label>
              <div class="mb-3">
                <select name="status" class="form-select mt-2" id="status"  aria-label="Default select example">
                  <option selected>Выберите статус</option>
                  @foreach ($status as $val)
                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                  @endforeach
                </select>
                @error('user')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="mb-2">
                <label for="transfer" class="form-label">Трансферная стоимость</label>
                <input type="text" name="transfer" class="form-control" id="transfer">
              </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-success">Добавить</button>
              </div>
          </form>
        </div>

      </div>
    </div>
  </div>
