<x-layout.main
    title="Edit Data Administrator"
>

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card p-3">

            <div class="row">
                <div class="col-md-6">
                    <h4 class="fw-bold mb-1">Edit Administrator</h2>
                    <span class="text-secondary">Silahkan isi form dibawah ini dengan benar</span>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    @if(Session::has("gagal"))
                        <div class="alert alert-danger">
                            <strong>Gagal</strong> {{ Session::get("gagal") }}
                        </div>
                    @endif
                    @if(Session::has("sukses"))
                        <div class="alert alert-success">
                            <strong>Berhasil</strong> {{ Session::get("sukses") }}
                        </div>
                    @endif
                </div>
            </div>

            <hr/>
            {{--  --}}
            <form 
                action="{{ route('update-admin', ['id' => $data->id]) }}"
                method="POST"
                class="row mt-4"
                autocomplete="off"
            >
                @csrf
                @method('PUT')
                <div class="col-md-6 mb-3">
                    <label for="nohp" class="form-label">Nomor Telepon</label>
                    <input 
                        id='nohp'
                        type="text"
                        class="form-control"
                        placeholder="Contoh: 0813xxxx"
                        name="nohp"
                        value="{{ $data->nohp }}"
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nuptl" class="form-label">NUPTK</label>
                    <input 
                        id='nuptk'
                        type="text"
                        class="form-control"
                        placeholder="Contoh: 192109xxxx"
                        name="nuptk"
                        value="{{ $data->nuptk }}"
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input 
                        id='nama'
                        type="text"
                        class="form-control"
                        placeholder="Contoh: Mardian"
                        name="nama"
                        value="{{ $data->nama }}"
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input 
                        id='tempat_lahir'
                        type="text"
                        class="form-control"
                        placeholder="Contoh: Bengkayang"
                        name="tempat_lahir"
                        value="{{ $data->tempat_lahir }}"
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tanggal" class="form-label">Tanggal Lahir</label>
                    <input 
                        id='tanggal'
                        type="date"
                        class="form-control"
                        placeholder="Masukan tanggal lahir"
                        name="tanggal_lahir"
                        value="{{ $data->tanggal_lahir }}"
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                    <input 
                        id='pendidikan'
                        type="text"
                        class="form-control"
                        placeholder="Contoh : S1"
                        name="pendidikan"
                        value="{{ $data->pendidikan }}"
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id='gender' name='gender'>
                        <option
                            @if($data->gender == "Laki - Laki")
                                @checked(true)
                            @endif
                        >Laki - Laki</option>
                        <option
                            @if($data->gender == "Perempuan")
                                @checked(true)
                            @endif
                        >Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label mb-0">Password</label>
                    <small class="mb-2 fst-italic text-sm d-block">kosongkan jika tidak ingin mengubah password</small>
                    <input 
                        id='password'
                        autocomplete="off"
                        type="password"
                        class="form-control"
                        placeholder="Buat Password yang kuat"
                        name="password"
                    />
                </div>
                <hr/>
                <div class="d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
            {{--  --}}
        </div>
    </div>
</div>
</x-layout.main>