<li class="sidebar-header">
    Menu
</li>

<li class="sidebar-item {{ request()->path() == 'dashboard/guru/home' ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route('home-guru') }}">
        <i class="align-middle material-icons">home</i>
        <span class="align-middle">Beranda</span>
    </a>
</li>


{{-- bagian kelas --}}
<li class="sidebar-header">
    Kelas
</li>
@foreach ($kelas as $item) 
<li class="sidebar-item {{ request()->path() == 'dashboard/guru/absensi/murid/' . $item->id ? 'active' : ''}}">
    <a class="sidebar-link" href="{{ route('list-absensi', ['kelasId' => $item->id]) }}">
        <i class="align-middle material-icons">radio_button_unchecked</i>
        <span class="align-middle">{{ $item->nama }}</span>
    </a>
</li>
@endforeach

{{-- bagian mata pelajaran --}}
<li class="sidebar-header">
    Mata Pelajaran
</li>
@foreach ($matpel as $item) 
<li class="sidebar-item {{ request()->path() == 'dashboard/guru/matpel/siswa/' . $item->id ? 'active' : ''}}">
    <a class="sidebar-link" href="{{ route('list-siswa-matpel', ['matpelId' => $item->id]) }}">
        <i class="align-middle material-icons">radio_button_unchecked</i>
        <span class="align-middle">{{ $item->nama }}</span>
    </a>
</li>
@endforeach

<li class="sidebar-header">
    Lainnya
</li>
<li class="sidebar-item">
    <a class="sidebar-link" href="{{ route('logout') }}">
        <i class="align-middle material-icons">logout</i>
        <span class="align-middle">Log Out</span>
    </a>
</li>