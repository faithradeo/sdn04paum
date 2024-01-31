@props([
    "action" => "",
])

<div class="modal fade" id="modalAddMatpel" tabindex="-1" aria-labelledby="modalAddMatpelLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ $action }}" method="POST" id='modal-input-guru' class="modal-content">
        @csrf
        <div class="modal-header">
          <h1 class="modal-title fs-4" id="modalAddMatpelLabel">Tambah Data Mata Pelajaran</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-floating mb-3 rounded-3">
                <input
                    type="text"
                    class="form-control"
                    id="namaMatpel"
                    placeholder="Contoh: Ilmu Pengetahuan Alam"
                    name="nama"
                />
                <label for="namaMatpel">Nama Matpel</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" name="semester" id="labelSemester" aria-label="Floating label select example">
                  <option selected>Pilih Semester</option>
                  <option>Ganjil</option>
                  <option>Genap</option>
                </select>
                <label for="labelSemester">Semester</label>
            </div>

            {{-- wali kelas --}}
            <div class="position-relative">
                <div class="form-floating mb-3 rounded-3">
                    <input
                        type="text"
                        class="form-control"
                        id="namaWali"
                        placeholder="Contoh: Toding"
                        name="namaWali"
                        autocomplete="off"
                        onkeyup="cariGuru('add')"
                    />
                    <label for="namaWali">Guru Pengajar</label>
                </div>
                <input type="hidden" name="user_id" id='waliId'/>
                <div id='list-guru' class="d-none position-absolute w-100 bg-white rounded-2 shadow-sm" style="height: 200px;overflow-y: auto;bottom: -200px;z-index: 10;background-color: white;">

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
                        id="namaKelas"
                        placeholder="Contoh: 1A"
                        name="namaKelas"
                        autocomplete="off"
                        onkeyup="searchKelas(this, 'list-kelas', 'kelasId')"
                    />
                    <label for="namaKelas">Kelas</label>
                </div>
                <input type="hidden" name="kelas_id" id='kelasId'/>
                <div id='list-kelas' class="d-none position-absolute w-100 bg-white bottom-5 rounded-2 shadow-sm" style="max-height: 200px;overflow-y: auto;">

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