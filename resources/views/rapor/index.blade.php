<x-layout.frontend
    title="Rapor Digital SDN 04 PAUM"
>
    <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="row w-100 justify-content-center">
            <div class="col-md-8 text-center">
                <h4 class="fw-bold">RAPORT DIGITAL</h4>
                <form action="{{ route('cetak-rapor') }}" method="POST" class="d-flex mt-5 flex-column flex-md-row justify-content-between">
                    @csrf
                    <input type="number" name="nisn" class="form-control rounded-0 rounded-start half-on-desktop" placeholder="Input NISN ( Nomor Induk Siswa Nasional )"/>
                    <div class="d-flex flex-1 flex-column flex-md-row justify-content-between align-items-center half-on-desktop">
                        <select name="semester" class="mt-2 mt-md-0 form-select rounded-0 border-start-md-0">
                            <option>Semester</option>
                            @foreach($semester as $item)
                                <option value="{{ $item->nama }}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                        <select name="kelas" class="mt-2 mt-md-0 form-select rounded-0">
                            <option>Kelas</option>

                            @foreach($kelas as $item)
                                <option value="{{ $item->id }}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="mt-2 fs-bold mt-md-0 btn btn-warning ms-3 half-on-desktop">
                            Cetak
                        </button>
                    </div>
                </form>

                {{-- alert --}}
                @if(Session::has("gagal"))
                    <div class="alert alert-danger my-3">
                        <strong>Gagal</strong> {{ Session::get("gagal") }}
                    </div>
                @endif
                {{--  --}}
                <small class="text-secondary text-sm d-block mt-5 fst-italic">Jika raport tidak tersedia silahkan hubungi wali kelas anda</small>
            </div>
        </div>
    </div>
</x-layout.frontend>