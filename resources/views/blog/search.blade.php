<x-layout.frontend
    title="Hasil pencarian"
>
<div class="container" style="min-height: 70vh;">
    <h3 class="fw-semibol">Hasil pencarian : {{$query}}</h3>

    <div class="row mt-5">
        @foreach($artikel as $item)    
        <div class="col-lg-4 mb-3 mb-lg-0">
            <div class="news-card news-card-1 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="card-body">
                    <div class="author-info media">
                        <img src="{{ asset('image/default.png') }}" alt="author" class="author-avatar">
                        <div class="media-body">
                            <h6 class="author-name">{{ $item->user->nama }}</h6>
                            <p class="news-post-date">{{ \Carbon\Carbon::parse($item->created_at)->format("d-m-Y") }}</p>
                        </div>
                    </div>
                    <div class="post-meta">
                        {{-- 4 min read --}}
                    </div>
                    <h5 class="post-title">{{ ucwords($item->judul) }}</h5>
                    <a href="{{ route('detail-artikel', ['slug' => $item->slug]) }}" class="post-permalink">Selengkapnya </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</x-layout.frontend>