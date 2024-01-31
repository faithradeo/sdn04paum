<x-layout.main
    title="Input Data Murid"
>

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card p-3">

            <div class="row">
                <div class="col-md-6">
                    <h4 class="fw-bold mb-1">Tambahkan Murid Baru</h2>
                    <span class="text-secondary">Silahkan isi form dibawah ini dengan benar</span>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    @if(Session::has("gagal"))
                        <div class="alert alert-danger">
                            <strong>Gagal</strong> {{ Session::get("gagal") }}
                        </div>
                    @endif
                </div>
            </div>

            <hr/>
            {{--  --}}
            <form action="{{ route('insert-murid') }}" method="POST" class="row mt-4">
                @csrf
                <div class="col-md-6 mb-3">
                    <label for="nohp" class="form-label">Nomor Telepon</label>
                    <input 
                        id='nohp'
                        type="text"
                        class="form-control"
                        placeholder="Contoh: 0813xxxx"
                        name="nohp"
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nis" class="form-label">Nomor Induk Siswa (NIS)</label>
                    <input 
                        id='nis'
                        type="text"
                        class="form-control"
                        placeholder="Contoh: 192109xxxx"
                        name="nis"
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
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kelas" class="form-label">Nama Kelas</label>
                    <input 
                        id='kelas'
                        type="text"
                        class="form-control"
                        placeholder="Contoh: 2"
                        name="kelas"
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id='gender' name='jenis_kelamin'>
                        <option>Laki - Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" placeholder="Masukan alamat lengkap" name="alamat"></textarea>
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