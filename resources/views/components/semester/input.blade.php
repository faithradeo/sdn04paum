@props([
    "action" => "",
])

<div class="modal fade" id="modalAddSemester" tabindex="-1" aria-labelledby="modalAddSemesterLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ $action }}" method="POST" id='modal-input-semester' class="modal-content">
        @csrf
        <div class="modal-header">
          <h1 class="modal-title fs-4" id="modalAddSemesterLabel">Tambah data semester</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-floating mb-3 rounded-3">
                <input
                    type="text"
                    class="form-control"
                    id="nama"
                    placeholder="Contoh: 2023/2024"
                    name="nama"
                />
                <label for="nama">Nama Semester</label>
            </div>
            <div class="form-check d-flex align-items-center">
                <input 
                    name="aktif"
                    class="form-check-input"
                    style="width: 20px; height: 20px;"
                    type="checkbox"
                    id="flexCheckChecked"
                >
                <label class="form-check-label ms-2" for="flexCheckChecked">
                  Semester Aktif
                </label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>