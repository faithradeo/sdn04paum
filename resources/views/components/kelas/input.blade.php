@props([
    "title" => "",
    "action" => "",
    "name" => "",
])

<div class="modal fade" id="{{$name}}" tabindex="-1" aria-labelledby="{{$name}}Label" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ $action }}" method="POST" id='modal-input-guru' class="modal-content">
        @csrf
        <div class="modal-header">
          <h1 class="modal-title fs-4" id="{{$name}}Label">{{ $title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-floating mb-3 rounded-3">
                <input
                    type="text"
                    class="form-control"
                    id="namaKelas"
                    placeholder="Contoh: 1A"
                    name="nama"
                />
                <label for="namaKelas">Nama Kelas</label>
            </div>

            {{-- wali kelas --}}
            <div class="position-relative">
                <div class="form-floating mb-3 rounded-3">
                    <input
                        type="text"
                        class="form-control"
                        id="namaWali"
                        placeholder="Contoh: 1A"
                        name="namaWali"
                        autocomplete="off"
                        onkeyup="cariGuru('add')"
                    />
                    <label for="namaWali">Nama Wali Kelas</label>
                </div>
                <input type="hidden" name="user_id" id='waliId'/>
                <div id='list-guru' class="d-none position-absolute w-100 bg-white bottom-5 rounded-2 shadow-sm" style="max-height: 200px;overflow-y: auto;">

                    {{-- list guru --}}
                    <div class="p-3 border-bottom" style="cursor: pointer;">
                        <span class="fw-semibold">Sulaiman</span>
                    </div>
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