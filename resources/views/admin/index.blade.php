<x-layout.main
    title="Data seluruh Administrator"
>
    <h1 class="fw-bold m-0">Data Administrator</h1>
    <span class="text-secondary">Administrator memiliki seluruh fitur dari sistem ini</span>

    {{-- header --}}
    <div class="d-flex flex-md-row flex-column mb-3 mb-md-0 justify-content-between align-items-center">
        <div class="d-flex justify-content-start full-on-mobile my-4">
            {{-- <button type="button" class="btn me-3 btn-lg btn-success d-flex justify-content-center align-items-center">
                <i class="material-icons me-2" style="font-size: 12px;">table_chart</i>
                <span>Import Data</span>
            </button> --}}
            <a 
                href="{{ route('create-admin') }}"
                class="btn btn-lg btn-primary d-flex justify-content-center align-items-center full-on-mobile"
            >
                <i class="material-icons me-2" style="font-size: 16px;">add</i>
                <span>Tambah data Administrator</span>
            </a>
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
                        <th>NUPTK</th>
                        <th>NO TELP</th>
                        <th>NAMA</th>
                        <th>JENIS KELAMIN</th>
                        <th>TTL</th>
                        <th>PENDIDIKAN</th>
                        <th>MATA PELAJARAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->nuptk }}</td>
                            <td>{{ $item->nohp }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->tempat_lahir }}, {{  $item->tanggal_lahir}}</td>
                            <td>{{ $item->pendidikan }}</td>
                            <td>
                                @if(count($item->matpel) > 0)
                                    @foreach($item->matpel as $matpel)
                                        <span class="badge text-bg-success me-1 my-1">{{ $matpel->nama }}</span>
                                    @endforeach
                                @else
                                    -
                                @endif
                            </td>
                            <td class="d-flex align-items-center">
                                <a 
                                    href='{{ route('edit-admin', ['id' => $item->id]) }}' 
                                    class="btn btn-sm btn-outline-warning me-2 p-0 px-2 py-2 rounded-2 d-flex align-items-center"
                                >
                                    <i class="material-icons" style="font-size: 12px;">edit</i>
                                </a>
                                <button onclick="DeleteGuru('Data tidak akan bisa dikembalikan', '{{ csrf_token() }}', '{{$item->id}}')" class="btn btn-sm btn-outline-danger p-0 px-2 py-2 rounded-2 d-flex align-items-center">
                                    <i class="material-icons" style="font-size: 12px;">delete</i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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