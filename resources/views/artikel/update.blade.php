<x-layout.main
    title="Publikasi Artikel"
>
    <div class="row justify-content-center">
        <form action="{{ route('update-artikel', ['id' => $data->id]) }}" method="POST" class="col-md-7">
            @csrf
            @method("PUT")
            <div class="card p-3">
                <h3 class="fw-bold m-0 mb-1">Edit Publikasi Artikel</h3>
                <hr/>

                <input 
                    class="form-control form-control-lg mb-3"
                    name="judul"
                    placeholder="Masukan judul artikel"
                    value="{{ $data->judul }}"
                />

                {{-- ck editor --}}
                <textarea name="body" class="mt-3">{{ $data->body }}</textarea>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-lg btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        CKEDITOR.replace( 'body' );
    </script>
</x-layout.main>