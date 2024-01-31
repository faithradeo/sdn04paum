@props([
    "action" => "",
])

<div class="modal fade" id="modalUpdateMatpel" tabindex="-1" aria-labelledby="modalUpdateMatpelLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ $action }}" method="POST" id='modal-update-matpel' class="modal-content">
        @csrf
        @method("PUT")
        <div class="modal-header">
          <h1 class="modal-title fs-4" id="modalUpdateMatpelLabel">Edit Data Mata Pelajaran</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-floating mb-3 rounded-3">
                <input
                    type="text"
                    class="form-control"
                    id="namaMatpelUpdate"
                    autocomplete="off"
                    placeholder="Contoh: Ilmu Pengetahuan Alam"
                    name="nama"
                />
                <label for="namaMatpelUpdate">Nama Matpel</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" name="semester" id="labelSemesterUpdate">
                  <option selected>Pilih Semester</option>
                  <option>Ganjil</option>
                  <option>Genap</option>
                </select>
                <label for="labelSemesterUpdate">Semester</label>
            </div>

            {{-- wali kelas --}}
            <div class="position-relative">
                <div class="form-floating mb-3 rounded-3">
                    <input
                        type="text"
                        class="form-control"
                        id="namaWaliUpdate"
                        placeholder="Contoh: Toding"
                        name="namaWaliUpdate"
                        autocomplete="off"
                        onkeyup="cariGuru('update')"
                    />
                    <label for="namaWaliUpdate">Guru Pengajar</label>
                </div>
                <input type="hidden" name="user_id" id='waliIdUpdate'/>
                <div id='list-guru-update' class="d-none position-absolute w-100 bg-white rounded-2 shadow-sm" style="height: 200px;overflow-y: auto;bottom: -200px;z-index: 10;background-color: white;">

                    {{-- list guru --}}
 
                    {{--  --}}
                </div>
            </div>

            {{-- kelas --}}
            <div class="position-relative">
                <div class="form-floating mb-3 rounded-3">
                    <input
                        type="text"
                        class="form-control"
                        id="namaKelasUpdate"
                        placeholder="Contoh: 1A"
                        name="namaKelasUpdate"
                        autocomplete="off"
                        onkeyup="searchKelas(this, 'list-kelas-update', 'kelasIdUpdate')"
                    />
                    <label for="namaKelasUpdate">Kelas</label>
                </div>
                <input type="hidden" name="kelas_id" id='kelasIdUpdate'/>
                <div id='list-kelas-update' class="d-none position-absolute w-100 bg-white bottom-5 rounded-2 shadow-sm" style="max-height: 200px;overflow-y: auto;">

                    {{-- list kelas --}}

                    {{--  --}}
                </div>
            </div>
            {{--  --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
    </div>
</div>