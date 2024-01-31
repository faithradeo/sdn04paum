<x-layout.frontend
    title="Kumpulan Artikel dan Publikasi"
>
<div class="container mt-5" style="min-height: 70vh;">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <h2 class="fw-medium" style="color: #363636;">{{ ucwords($artikel->judul) }}</h2>

            {{-- author --}}
            <div class="d-flex align-items-start mt-3">
                <img src="{{ asset('image/default.png') }}" alt="author" style="width: 40px; height: 40px;"/>
                <div class="ms-2">
                    <strong style="font-size: 14px;">{{ $artikel->user->nama }}</strong>
                    <span class="text-secondary text-sm d-block" style="font-size: 14px;">{{ \Carbon\Carbon::parse($artikel->created_at)->format("d-m-Y") }}</span>
                </div>
            </div>
            <hr/>
            {{-- body --}}
            <div class="mt-5">
                {!! $artikel->body !!}
            </div>
        </div>
    </div>
</div>
</x-layout.frontend>