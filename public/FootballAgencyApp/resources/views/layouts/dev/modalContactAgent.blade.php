<div class="modal fade" id="modalContactAgent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Свзяться с агентом</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('agent.dealAgent', ['id' => $agent->id]) }}" method="GET" >
            @csrf
            <div class="mb-2">
              <label for="users" class="col-form-label">Выберите игрока</label>
              <div class="mb-3">
                <select name="user" class="form-select mt-2" id="users"  aria-label="Default select example">
                  <option selected>Выберите пользователя</option>
                  @foreach ($agent->player as $user)
                    <option value="{{ $user->id }}">{{ $user->users->name }} {{ $user->users->surname }}</option>
                  @endforeach
                </select>
                @error('user')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="mb-2">
                <label for="users" class="col-form-label">Выберите клуб покупателя</label>
                <div class="mb-3">
                  <select name="club" class="form-select mt-2" id="users"  aria-label="Default select example">
                    <option selected>Выберите клуб покупателя</option>
                    @foreach ($clubs as $club)
                      <option value="{{ $club->id }}">{{ $club->name }}</option>
                    @endforeach
                  </select>
                  @error('user')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

            <div class="mb-2">
                <label for="transfer" class="form-label">Введите сообщение</label>
                <textarea name="text" class="form-control" id="textAreaExample1" rows="4" style="max-height: 500px"></textarea>
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
