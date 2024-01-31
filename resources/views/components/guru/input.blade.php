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
                    type="number"
                    class="form-control"
                    id="nohp"
                    placeholder="Contoh: 0815xxxxx"
                    name="nohp"
                />
                <label for="nohp">Nomor HP</label>
            </div>
            <div class="form-floating mb-3 rounded-3">
                <input
                    type="number"
                    class="form-control"
                    id="nuptklabel"
                    placeholder="Nomor Unik Pendidik dan Tenaga Kependidikan"
                    name="nuptk"
                />
                <label for="nuptklabel">NUPTK</label>
            </div>
            <div class="form-floating mb-3">
                <input 
                    type="text"
                    class="form-control"
                    id="namalabel"
                    placeholder="Contoh: Herlina"
                    name="nama"
                />
                <label for="namalabel">Nama Guru</label>
            </div>
            <div class="form-floating mb-3">
                <select 
                    class="form-select"
                    id="genderlabel"
                    name="gender"
                >
                    <option selected>Pilih Jenis Kelamin</option>
                    <option>Laki - Laki</option>
                    <option>Perempuan</option>
                </select>
                <label for="genderlabel">Jenis Kelamin</label>
            </div>
            <div class="form-floating mb-3">
                <input
                    type="text"
                    class="form-control"
                    id="pendidikanlabel"
                    placeholder="Contoh: S1"
                    name="pendidikan"
                />
                <label for="pendidikanlabel">Pendidikan</label>
            </div>
            <div class="form-floating mb-3">
                <input 
                    type="text"
                    class="form-control"
                    id="tempatlahirlabel"
                    placeholder="Contoh: Jagoi Babang"
                    name="tempat_lahir"
                />
                <label for="tempatlahirlabel">Tempat Lahir</label>
            </div>
            <div class="form-floating mb-3">
                <input 
                    type="date"
                    class="form-control"
                    id="tanggallabel"
                    placeholder="Masukan tanggal lahir"
                    name="tanggal_lahir"
                />
                <label for="tanggallabel">Tanggal Lahir</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>