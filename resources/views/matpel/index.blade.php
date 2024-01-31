<x-layout.main
    title="Data Seluruh Mata Pelajaran"
>
    <h1 class="fw-bold m-0">Data Mata Pelajaran</h1>
    <span class="text-secondary">Menampilkan data seluruh mata pelajaran</span>

    {{-- header --}}
    <div class="d-flex justify-content-between mb-md-0 mb-3 flex-md-row flex-column align-items-center">
        <div class="d-flex justify-content-start full-on-mobile my-4">
            <button 
                type="button"
                class="btn btn-lg btn-primary d-flex justify-content-center align-items-center full-on-mobile"
                data-bs-toggle="modal"
                data-bs-target="#modalAddMatpel"
            >
                <i class="material-icons me-2" style="font-size: 16px;">add</i>
                <span>Tambah Data Matpel</span>
            </button>
        </div>
        
        {{-- search --}}
        <input 
            type="text" 
            id='form-search'
            class="form-control form-control-lg w-fit flex-1 full-on-mobile"
            placeholder="Telusuri"
        />
    </div>
    {{-- data --}}
    <div class="card p-3">

        {{-- alert --}}
        @if(Session::has("gagal"))
            <div class="alert alert-danger" role="alert">
                <strong>Gagal</strong> {{ Session::get("gagal") }}
            </div>
        @endif

        @if(Session::has("sukses"))
            <div class="alert alert-success" role="alert">
                <strong>Berhasil</strong> {{ Session::get("sukses") }}
            </div>
        @endif

        {{--  --}}
        <div class="table-responsive">
            <table class="table table-striped" id='table'>
                <thead>
                    <tr>
                        <th>NAMA MATPEL</th>
                        <th>GURU PENGAJAR</th>
                        <th>KELAS</th>
                        <th>SEMESTER</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->guru->nama }}</td>
                        <td>{{ $item->kelas->nama }}</td>
                        <td>{{ $item->semester }}</td>
                        <td class="d-flex align-items-center">
                            <button 
                                    onclick="detailMatpel('{{ $item->id }}')"
                                    class="btn btn-sm btn-outline-warning me-2 p-0 px-2 py-2 rounded-2 d-flex align-items-center"
                                >
                                    <i class="material-icons" style="font-size: 12px;">edit</i>
                            </button>
                            <button 
                                title="Hapus"
                                class="btn btn-sm btn-outline-danger p-0 px-2 py-2 rounded-2 d-flex align-items-center"
                                onclick="DeleteMatpel('{{ csrf_token() }}', '{{ $item->id }}')"
                            >
                                <i class="material-icons" style="font-size: 12px;">delete</i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- modal add matpel --}}
    <x-matpel.add
        action="{{ route('insert-matpel') }}"
    />

    {{-- modal update matpel --}}
    <x-matpel.update
        action=""
    />

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

    <script type="text/javascript">
        let table = new DataTable("#table", {
            responsive: true,
            searching: true,
        })

        $('#form-search').on('input', function() {
            var searchTerm = $(this).val().toLowerCase();
            table.search(searchTerm).draw();
        });
    </script>
</x-layout.main>