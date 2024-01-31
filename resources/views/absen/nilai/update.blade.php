<x-layout.main
    title="Input Data Nilai Absensi"
>

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card p-3">

            <div class="row">
                <div class="col-md-6">
                    <h4 class="fw-bold mb-1">Input Nilai Absensi</h2>
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
            <form action="{{ route('edit-nilai-absen', ['id' => $nilai->id]) }}" method="POST" class="row mt-4">
                @csrf
                @method("PUT")
                {{--  --}}
                <div class="col-md-6 mb-3">
                    <label for="nis" class="form-label">Kelas</label>
                    <input 
                        id='nis'
                        type="text"
                        class="form-control"
                        placeholder="Contoh: 1"
                        value="{{ $nilai->kelas->nama }}"
                        disabled
                    />
                    <input type="hidden" name="kelas_id" value="{{ $nilai->kelas->id }}"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="namamurid" class="form-label">Nama Murid</label>
                    <input 
                        id='namamurid'
                        type="text"
                        class="form-control"
                        placeholder="Contoh: 1"
                        value="{{ $nilai->murid->nama }}"
                        readonly
                    />
                    <input type="hidden" name="murid_id" value="{{ $nilai->murid->id }}"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <input 
                        id='semester'
                        type="text"
                        class="form-control"
                        placeholder="Contoh: 2022/2023"
                        name="semester"
                        value="{{ $nilai->semester }}"
                        readonly
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="alpha" class="form-label">Jumlah Alpha</label>
                    <input 
                        id='alpha'
                        type="number"
                        class="form-control"
                        placeholder="Contoh: 10"
                        name="alpha"
                        value="{{ $nilai->alpha }}"
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="hadir" class="form-label">Jumlah Hadir</label>
                    <input 
                        id='hadir'
                        type="number"
                        class="form-control"
                        placeholder="Contoh: 7"
                        name="hadir"
                        value='{{ $nilai->hadir }}'
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="izin" class="form-label">Jumlah Izin</label>
                    <input 
                        id='izin'
                        type="number"
                        class="form-control"
                        placeholder="Contoh: 7"
                        name="izin"
                        value="{{ $nilai->izin }}"
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sakit" class="form-label">Jumlah Sakit</label>
                    <input 
                        id='sakit'
                        type="number"
                        class="form-control"
                        placeholder="Contoh: 1"
                        name="sakit"
                        value="{{ $nilai->sakit }}"
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

{{-- menampilkan semua error --}}
@if($errors->any)
@foreach($errors->all() as $error)
    <x-alert.toast
        title="Peringahatan"
        message="{{ $error }}"
        color=""
    />
@endforeach
@endif
</x-layout.main>