<div class="modal fade" id="modalPindahKelas" tabindex="-1" aria-labelledby="modalPindahKelasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" id='form-pindah-kelas' method="POST" class="modal-content">
            @csrf
            @method("PUT")
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalPindahKelasLabel">Pindah Kelas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input 
                        type="text"
                        class="form-control"
                        readonly
                        id="nama-murid"
                        placeholder="contoh : Herman"
                    >
                    <label for="nama-murid">Nama Murid</label>
                </div>
                <div class="form-floating mb-3">
                    <input 
                        type="text"
                        class="form-control"
                        readonly
                        id="kelas-asal"
                        placeholder="contoh : 1"
                    >
                    <label for="kelas-asal">Kelas Asal</label>
                </div>
                <div class="form-floating mb-3">
                    <input 
                        type="text"
                        class="form-control"
                        name="tujuan"
                        autofocus
                        id="kelas-tujuan"
                        placeholder="contoh : 2"
                    >
                    <label for="kelas-tujuan">Kelas Tujuan</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
