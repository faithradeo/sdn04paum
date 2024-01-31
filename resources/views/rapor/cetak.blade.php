<!DOCTYPE html/>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    </head>
    <body>
        <div class="container-raport px-5 py-5" id='print-area'>
            <div class="w-100 d-flex justify-content-center align-items-center">
        
                {{-- logo sekolah --}}
                <img src="https://2.bp.blogspot.com/-PY1z8dxQAXc/TyK-3DEzrTI/AAAAAAAAAPQ/mZqmn9hUC74/s1600/Logo+Provinsi+KalBar.png" style="width: 80px;"/>
        
                {{-- keterangan --}}
                <div class="text-center" style="width: 90%;">
                    <h3 class="fs-5 m-0">PEMERINTAH KABUPATEN BENGKAYANG</h3>
                    <h3 class="fs-2 fw-bold">DINAS PENDIDIKAN</h3>
                    <h3 class="fs-2 m-0">SDN 04 PAUM</h3>
                    <p class="mt-3 text-sm text-secondary">KECAMATAN JAGOI BABANG KABUPATEN BENGKAYANG</p>
                </div>
        
                {{-- logo kemendikbud --}}
                <img src="https://www.kemdikbud.go.id/main/files/large/83790f2b43f00be" style="width: 100px; height: 100px;"/>
                {{--  --}}
            </div>
            <hr/>

            {{-- data diri siswa --}}
            <div class="d-flex justify-content-between align-items-start">
                <div class="w-50">
                    <table class="table table-borderless">
                        <tr>
                            <td>NAMA</td>
                            <td>:</td>
                            <td>{{ strtoupper($murid->nama) }}</td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td>{{ $murid->nis }}</td>
                        </tr>
                    </table>
                </div>
                <div class="w-50">
                    <table class="table table-borderless">
                        <tr>
                            <td>SEMESTER</td>
                            <td>:</td>
                            <td>{{ $semester }}</td>
                        </tr>
                        <tr>
                            <td>KELAS</td>
                            <td>:</td>
                            <td>{{ $kelas->nama }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            {{-- mata pelajaran --}}
            <strong>Nilai Mata Pelajaran</strong>
            <div class="mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Mata Pelajaran</th>
                            <th>Nilai</th>
                            <th>Guru Pengajar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matpel as $key => $item)
                        <tr>
                            <td>{{ $item->matpel->nama }}</td>
                            <td>{{ $item->nilai }}</td>
                            <td>{{ $item->matpel->guru->nama }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- nilai absensi --}}
            <strong>Nilai Absensi</strong>
            <div class="mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alpha</th>
                            <th>Hadir</th>
                            <th>Izin</th>
                            <th>Sakit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($absensi as $key => $item)
                            <tr>
                                <td>{{ $item->alpha }}</td>
                                <td>{{ $item->hadir }}</td>
                                <td>{{ $item->izin }}</td>
                                <td>{{ $item->sakit }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- keterangan waktu --}}
            <div class="d-flex justify-content-end mt-4 mb-5">
                <div style="width: 50%;">
                    <table class="table table-borderless">
                        <tr>
                            <td>DIBERIKAN DI</td>
                            <td>:</td>
                            <td>DESA PAUM</td>
                        </tr>
                        <tr>
                            <td>PADA</td>
                            <td>:</td>
                            <td>{{ \Carbon\Carbon::now()->format("d-m-Y") }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            {{-- ketrangan wali kelas dan wali murid --}}
            <div class="d-flex justify-content-between align-items-center">
                <div class="w-50 text-center">
                    <span>Mengetahui</span>
                    <span class="d-block">Orang Tua / Wali</span>
                    <br/>
                    <br/>
                    <hr/>
                </div>
                <div class="w-50 ms-3 text-center">
                    <span>Mengetahui</span>
                    <span class="d-block">Wali Kelas</span>
                    <br/>
                    <br/>
                    <span class="fw-bold">{{ $kelas->user->nama }}</span>
                    <hr class="m-0"/>
                    <span>{{ $kelas->user->nuptk }}</span>
                </div>
            </div>
        </div>

        <div class="position-fixed" style="right: 50px; bottom: 50px;">
            <button onclick="downloadPdf()" class="d-print-none btn btn-primary rounded-0 shadow-md">
                Download Raport PDF
            </button>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>

            function downloadPdf(){
                window.print()
            }
        </script>
    </body>
</html>