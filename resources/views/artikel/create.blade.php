<x-layout.main
    title="Publikasi Artikel"
>
    <div class="row justify-content-center">
        <form action="{{ route('insert-artikel') }}" method="POST" class="col-md-7">
            @csrf
            <div class="card p-3">
                <h3 class="fw-bold m-0 mb-1">Publikasi Artikel</h3>
                <hr/>

                <input 
                    class="form-control form-control-lg mb-3"
                    name="judul"
                    placeholder="Masukan judul artikel"
                />

                {{-- ck editor --}}
                <textarea name="body" class="mt-3"></textarea>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-lg btn-primary">Publikasikan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        CKEDITOR.replace( 'body' );
    </script>
</x-layout.main>