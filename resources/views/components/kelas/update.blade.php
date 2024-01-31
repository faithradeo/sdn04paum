@props([
    "title" => "",
    "action" => "",
    "name" => "",
])

<div class="modal fade" id="{{$name}}" tabindex="-1" aria-labelledby="{{$name}}Label" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ $action }}" method="POST" id='modal-update-guru' class="modal-content">
        @csrf
        @method("PUT")
        <div class="modal-header">
          <h1 class="modal-title fs-4" id="{{$name}}Label">{{ $title }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-floating mb-3 rounded-3">
                <input
                    type="text"
                    class="form-control"
                    id="namaKelasUpdate"
                    placeholder="Contoh: 1A"
                    name="nama"
                />
                <label for="namaKelasUpdate">Nama Kelas</label>
            </div>

            {{-- wali kelas --}}
            <div class="position-relative">
                <div class="form-floating mb-3 rounded-3">
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Contoh: 1A"
                        name="namaWali"
                        id="namaWaliUpdate"
                        autocomplete="off"
                        onkeyup="cariGuru('update')"
                    />
                    <label for="namaWaliUpdate">Nama Wali Kelas</label>
                </div>
                <input type="hidden" name="user_id" id='waliIdUpdate'/>
                <div id='list-guru-update' class="d-none position-absolute w-100 bg-white bottom-5 rounded-2 shadow-sm" style="max-height: 200px;overflow-y: auto;">

                    {{-- list guru --}}

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