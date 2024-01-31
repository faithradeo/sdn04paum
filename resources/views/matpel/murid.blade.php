<x-layout.main
    title="Data Seluruh Murid Mata Pelajaran {{$matpel->nama}}"
>
    <h1 class="fw-bold m-0">Data Murid {{ $matpel->nama }}</h1>
    <span class="text-secondary">Menampilkan data seluruh murid kelas {{ $matpel->kelas->nama }} mata pelajaran {{ $matpel->nama }}</span>

    {{-- header --}}
    <div class="d-flex mt-3 mt-md-0 mb-3 justify-content-end mb-3 align-items-center">
        {{-- search --}}
        <input 
            type="text" 
            id='form-search' 
            class="form-control full-on-mobile form-control-lg w-fit flex-1" style="width: 300px;" 
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
                        <th>NIS</th>
                        <th>NAMA</th>
                        <th>SEMESTER</th>
                        <th>KELAS</th>
                        <th>STATUS NILAI</th>
                        <th>NILAI MATPEL</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->semester }}</td>
                            <td>{{ $item->nama_kelas }}</td>
                            <td>
                                @if($item->nilai_id == null)
                                <span class="badge text-bg-danger">Belum Berinput</span>
                                @else
                                <span class="badge text-bg-success">Sudah Terinput</span>
                                @endif
                            </td>
                            <td>{{ $item->nilai !== null ? $item->nilai : '-' }}</td>
                            <td class="d-flex align-items-center">
    
                                @if($item->nilai_id == null)
                                <a 
                                    href='/dashboard/guru/matpel/nilai/input/{{$matpel->id}}/{{$item->id}}' 
                                    class="btn btn-sm btn-outline-info me-2 p-0 px-2 py-2 rounded-2 d-flex align-items-center"
                                >
                                    Input Nilai
                                </a>
                                @else
                                <a 
                                    href='/dashboard/guru/matpel/nilai/edit/{{$matpel->id}}/{{$item->id}}' 
                                    class="btn btn-sm btn-outline-warning me-2 p-0 px-2 py-2 rounded-2 d-flex align-items-center"
                                >
                                    Edit Nilai
                                </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

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