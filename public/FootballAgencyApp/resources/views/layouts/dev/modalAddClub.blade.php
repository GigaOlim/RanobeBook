<div class="modal fade" id="modalAddClub" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить Клуб</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.addClub') }}" method="POST">
            @csrf
            <div class="mb-2">
                <label for="club" class="form-label">Название клуба</label>
                <input type="text" name="club" class="form-control" id="club">
              </div>
            <div class="mb-2">
                    <select name="country" class="form-select mt-2" id="agents"  aria-label="Default select example">
                      <option selected>Выберите страну</option>
                      @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                      @endforeach
                    </select>
                    @error('user')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
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
