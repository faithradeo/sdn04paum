<x-layout.main
    title="Data Seluruh Semester"
>
    <h1 class="fw-bold m-0">Data Semester</h1>
    <span class="text-secondary">Silahkan sesuaikan data semester sesuai kebutuhan</span>

    {{-- header --}}
    <div class="d-flex flex-md-row flex-column mb-3 mb-md-0 justify-content-between align-items-center">
        <div class="d-flex justify-content-start full-on-mobile my-4">
            {{-- <button type="button" class="btn me-3 btn-lg btn-success d-flex justify-content-center align-items-center">
                <i class="material-icons me-2" style="font-size: 12px;">table_chart</i>
                <span>Import Data</span>
            </button> --}}
            <button 
                type="button"
                class="btn w-100 btn-lg btn-primary d-flex justify-content-center align-items-center"
                data-bs-toggle="modal"
                data-bs-target="#modalAddSemester"
            >
                <i class="material-icons me-2" style="font-size: 16px;">add</i>
                <span>Tambah data Semester</span>
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
        <table class="table table-striped" id='table'>
            <thead>
                <tr>
                    <th>NAMA SEMESTER</th>
                    <th>AKTIF</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>
                            <input 
                                class="form-check-input" 
                                type="checkbox"
                                @if($item->aktif)
                                @checked(true)
                                @endif
                                onchange="StatusToggle(this, '{{ csrf_token() }}', '{{ $item->id }}')"
                            />
                        </td>
                        <td>
                            <button onclick="DeleteSemester('{{ csrf_token() }}', '{{$item->id}}')" class="btn btn-sm btn-outline-danger p-0 px-2 py-2 rounded-2 d-flex align-items-center">
                                <i class="material-icons" style="font-size: 12px;">delete</i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- modal add semester --}}
    <x-semester.input
        action="{{ route('insert-semester') }}"
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