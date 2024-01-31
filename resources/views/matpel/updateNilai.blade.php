<x-layout.main
    title="Edit Data Nilai"
>

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card p-3">

            <div class="row">
                <div class="col-md-6">
                    <h4 class="fw-bold mb-1">Edit Nilai Mata Pelajaran</h2>
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
            <form action="{{ route('update-nilai-matpel', ['id' => $nilai->id]) }}" method="POST" class="row mt-4">
                @csrf
                @method("PUT")
                <div class="col-md-6 mb-3">
                    <label for="nohp" class="form-label">Mata Pelajaran</label>
                    <input
                        id='nohp'
                        type="text"
                        class="form-control"
                        placeholder="Contoh: Bahasa Inggris"
                        value="{{ $matpel->nama }}"
                        disabled
                    />
                    <input type="hidden" name="matpel_id" value="{{ $matpel->id }}"/>
                </div>

                {{--  --}}
                <div class="col-md-6 mb-3">
                    <label for="nis" class="form-label">Kelas</label>
                    <input 
                        id='nis'
                        type="text"
                        class="form-control"
                        placeholder="Contoh: 1"
                        value="{{ $matpel->kelas->nama }}"
                        disabled
                    />
                    <input type="hidden" name="kelas_id" value="{{ $matpel->kelas->id }}"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="namamurid" class="form-label">Nama Murid</label>
                    <input 
                        id='namamurid'
                        type="text"
                        class="form-control"
                        placeholder="Contoh: 1"
                        value="{{ $murid->nama }}"
                        readonly
                    />
                    <input type="hidden" name="murid_id" value="{{ $murid->id }}"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <input 
                        id='semester'
                        type="text"
                        class="form-control"
                        placeholder="Contoh: 2022/2023"
                        name="semester"
                        value="{{ $semester->nama }}"
                        readonly
                    />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="nilai" class="form-label">Nilai Mata Pelajaran</label>
                    <input 
                        id='nilai'
                        type="number"
                        class="form-control"
                        placeholder="Contoh: 70"
                        name="nilai"
                        value="{{ $nilai->nilai }}"
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