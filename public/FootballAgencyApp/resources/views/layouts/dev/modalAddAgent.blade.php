<div class="modal fade" id="modalAddAgent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить агента</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.addAgent') }}" method="POST">
            @csrf
            <div class="mb-2">
              <label for="recipient-name" class="col-form-label">Выберите пользователя:</label>
              <div class="mb-3">
                <select name="agent_id" class="form-select mt-2"  aria-label="Default select example">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Закрыть</button>
                <button type="submit" class="btn btn-success">Добавить</button>
              </div>
          </form>
        </div>

      </div>
    </div>
  </div>
