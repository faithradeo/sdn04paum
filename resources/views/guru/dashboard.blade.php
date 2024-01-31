<x-layout.main
    title="Selamat Datang"
>

<div class="row justify-content-center">
    <div class="col-md-8">
        {{-- profile info --}}
        <div class="card p-3 position-relative banner-profile">
            {{-- profile data --}}
            <div class="w-100 px-0 px-md-3 d-flex align-items-start position-absolute" style="bottom: -30px;">
                <img 
                    src="{{ asset('image/default.png') }}"
                    alt=""
                    class="border border-3"
                    style="width: 120px;height: 120px;border-radius: 50%;"
                />
                <div class="ms-4 pt-3">
                    <h4 class="m-0 mb-1 fw-semibold">{{ Auth::user()->nama }}</h4>

                    <div class="d-flex align-items-center">
                        <span class="d-block text-secondary">{{ Auth::user()->nuptk }}</span>
                        <a href="{{ route('edit-guru', ['id' => Auth::user()->id]) }}">
                            <i class="material-icons text-secondary ms-2 fs-4">settings</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{--  --}}
        <hr class="mt-5"/>
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="card p-3 pt-4 text-center">
                    <h1 class="fw-bold">{{$semester->nama}}</h1>
                    <span class="text-secondary">Semester Aktif</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3 pt-4 text-center">
                    <h1 class="fw-bold">{{ count($kelas) }}</h1>
                    <span class="text-secondary">Kelas Ditangani</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3 pt-4 text-center">
                    <h1 class="fw-bold">{{ $matpel }}</h1>
                    <span class="text-secondary">Mata Pelajaran Ditangani</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3 pt-4 text-center">
                    <h1 class="fw-bold">{{ $murid }}</h1>
                    <span class="text-secondary">Murid Ditangani</span>
                </div>
            </div>
        </div>
        {{--  --}}
    </div>
</div>

</x-layout.main>