<x-layout.main
    title="Edit data diri"
>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <form action="{{ route('ubah-data-guru', ['id' => $guru->id]) }}" method="POST" class="card p-3">
                @csrf
                @method("PUT")
                <h4 class="m-0 mb-1 fw-bold">Edit data diri</h4>
                <span class="d-block text-secondary">Pastikan data dibawah ini benar</span>
                <hr/>

                {{-- alert --}}
                @if(Session::has("sukses"))
                    <div class="alert alert-success my-3">
                        <strong>Berhasil</strong> {{ Session::get("sukses") }}
                    </div>
                @endif
                {{--  --}}

                <div class="row">
                    <div class="col-md-6 mt-3">
                        <label class="text-sm form-label">Nama Lengkap</label>
                        <input 
                            type="text" 
                            placeholder="contoh: Vera Herlina"
                            class="form-control"
                            value="{{ $guru->nama }}"
                            name="nama"
                        />
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="text-sm form-label">NUPTK</label>
                        <input 
                            type="number" 
                            placeholder="contoh: 19210xxxx"
                            class="form-control"
                            value="{{ $guru->nuptk }}"
                            name="nuptk"
                        />
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="text-sm form-label">Nomor Telepon</label>
                        <input 
                            type="text"
                            placeholder="contoh: 08135xxxxx"
                            class="form-control"
                            value="{{ $guru->nohp }}"
                            name="nohp"
                        />
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="text-sm form-label">Password</label>
                        <input 
                            type="password" 
                            placeholder="Buat Password yang kuat"
                            class="form-control"
                            name="password"
                            autocomplete="off"
                        />
                    </div>
                </div>

                <hr/>
                <div class="d-flex justify-content-end mt-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-layout.main>