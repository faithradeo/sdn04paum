<li class="sidebar-header">
    Menu
</li>
<li class="sidebar-item {{ request()->path() == "dashboard/guru" ? "active" : ''}}">
    <a class="sidebar-link" href="{{ route('list-guru') }}">
        <i class="align-middle material-icons">school</i>
        <span class="align-middle">Guru</span>
    </a>
</li>

<li class="sidebar-item {{ request()->path() == "dashboard/kelas" ? "active" : ''}}">
    <a class="sidebar-link" href="{{ route('list-kelas') }}">
        <i class="align-middle material-icons">chair_alt</i>
        <span class="align-middle">Kelas</span>
    </a>
</li>
<li class="sidebar-item {{ request()->path() == "dashboard/matpel" ? "active" : ''}}">
    <a class="sidebar-link" href="{{ route('list-matpel') }}">
        <i class="align-middle material-icons">menu_book</i>
        <span class="align-middle">Mata Pelajaran</span>
    </a>
</li>
<li class="sidebar-item {{ request()->path() == "dashboard/murid" ? "active" : ''}}">
    <a class="sidebar-link" href="{{ route('list-murid') }}">
        <i class="align-middle material-icons">settings_accessibility</i>
        <span class="align-middle">Murid</span>
    </a>
</li>

<li class="sidebar-header">
    Informasi
</li>
<li class="sidebar-item {{ request()->path() == "dashboard/artikel" ? "active" : ''}}">
    <a class="sidebar-link" href="{{ route('list-artikel') }}">
        <i class="align-middle material-icons">auto_stories</i>
        <span class="align-middle">Artikel</span>
    </a>
</li>

<li class="sidebar-header">
    Lainnya
</li>
<li class="sidebar-item {{ request()->path() == "dashboard/semester" ? "active" : ''}}">
    <a class="sidebar-link" href="{{ route('list-semester') }}">
        <i class="align-middle material-icons">layers</i>
        <span class="align-middle">Semester</span>
    </a>
</li>
<li class="sidebar-item {{ request()->path() == "dashboard/admin" ? "active" : ''}}">
    <a class="sidebar-link" href="{{ route('list-admin') }}">
        <i class="align-middle material-icons">person</i>
        <span class="align-middle">Administrator</span>
    </a>
</li>
<li class="sidebar-item">
    <a class="sidebar-link" href="{{ route('logout') }}">
        <i class="align-middle material-icons">logout</i>
        <span class="align-middle">Log Out</span>
    </a>
</li>