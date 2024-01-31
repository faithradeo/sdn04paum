<x-layout.main
    title="Data Seluruh Murid Kelas {{ $kelas->nama }}"
>
    <h1 class="fw-bold m-0">Data Absensi Murid Kelas {{ $kelas->nama }}</h1>
    <span class="text-secondary">Menampilkan data absensi seluruh murid kelas {{ $kelas->nama }}</span>

    {{-- header --}}
    <div class="d-flex flex-md-row flex-column justify-content-between mb-3 align-items-center">
        <div class="d-flex justify-content-start my-4 full-on-mobile">
            <button 
                class="btn d-none btn-primary btn-lg d-flex align-items-center justify-content-center full-on-mobile"
                id='btn-pindah-kelas'
                data-bs-toggle="modal"
                data-bs-target="#modalPindahKelas"
            >
                Pindah Kelas
                <i class="material-icons ms-2" style="font-size: 18px;">arrow_forward</i>
            </button>
        </div>
        
        {{-- search --}}
        <input type="text" id='form-search' class="form-control form-control-lg w-fit flex-1 full-on-mobile" placeholder="Telusuri"/>
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
                        <th>TTL</th>
                        <th>STATUS NILAI</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($murid as $item)
                        <tr style="cursor: pointer" onclick="HandlePilihMurid('{{$item->id}}')">
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}</td>
                            <td>
                                @if($item->absen_id == null)
                                    <span class="badge text-bg-danger">Belum Terinput</span>
                                @elseif($item->kelas_id != $item->nilai_kelas)
                                    <span class="badge text-bg-danger">Belum Terinput</span>
                                @elseif($item->nilai_semester != $semester->nama)
                                    <span class="badge text-bg-danger">Belum Terinput</span>
                                @else
                                    <span class="badge text-bg-success">Sudah Terinput</span>
                                @endif
                            </td>
                            <td class="d-flex align-items-center">
                                @if($item->absen_id == null)
                                    <a
                                        href="{{ route('input-nilai-absen', ['muridId' => $item->id]) }}" 
                                        class="btn btn-sm btn-outline-info me-2 p-0 px-2 py-2 rounded-2 d-flex align-items-center"
                                    >
                                        Input Nilai
                                    </a>
                                @elseif($item->kelas_id != $item->nilai_kelas)
                                    <a
                                        href="{{ route('input-nilai-absen', ['muridId' => $item->id]) }}" 
                                        class="btn btn-sm btn-outline-info me-2 p-0 px-2 py-2 rounded-2 d-flex align-items-center"
                                    >
                                        Input Nilai
                                    </a>
                                @elseif($item->nilai_semester != $semester->nama)
                                    <a
                                        href="{{ route('input-nilai-absen', ['muridId' => $item->id]) }}" 
                                        class="btn btn-sm btn-outline-info me-2 p-0 px-2 py-2 rounded-2 d-flex align-items-center"
                                    >
                                        Input Nilai
                                    </a>
                                @else
                                    <a
                                        href="{{ route('update-nilai-absen', ['id' => $item->absen_id]) }}"
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

    {{-- modal pindah kelas --}}
    <x-murid.pindah/>

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