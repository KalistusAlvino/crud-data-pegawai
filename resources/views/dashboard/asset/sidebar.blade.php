<div class="d-flex">
    <button id="toggle-btn" type="button">
        <i class="fa-brands fa-gripfire"></i>
    </button>
    <div class="sidebar-logo">
        <a href="{{ route('pegawai.index') }}">
            PNS
        </a>
    </div>
</div>
<ul class="sidebar-nav">
    <li class="sidebar-item">
        <a href="#" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#auth"
            aria-expanded="false" aria-controls="auth">
            <i class="fa-solid fa-shield"></i>
            <span>Pegawai</span>
        </a>
        <ul id="auth" class="sidebar-dropdown list-untyled collapse" data-bs-target="#sidebar">
            <li class="sidebar-item">
                <a href="{{ route('pegawai.index') }}" class="sidebar-link">
                    Data Pegawai
                </a>
            </li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="" class="sidebar-link has-dropdown collapsed" data-bs-toggle="collapse" data-bs-target="#multi"
            aria-expanded="false" aria-controls="multi">
            <i class="fa-solid fa-border-all"></i>
            <span>
                Master Data
            </span>
        </a>
        <ul id="multi" class="sidebar-dropdown list-untyled collapse" data-bs-target="#sidebar">
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-one"
                    aria-expanded="false" aria-controls="multi-one">
                    Organisasi
                </a>
                <ul id="multi-one" class="sidebar-dropdown list-untyled collapse">
                    <li class="sidebar-item">
                        <a href="{{ route('dashboard-unit-index') }}" class="sidebar-link">
                            Unit Kerja
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('dashboard-jabatan-index') }}" class="sidebar-link">
                            Jabatan
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('dashboard-eselon-index') }}" class="sidebar-link">
                            Eselon
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('dashboard-golongan-index') }}" class="sidebar-link">
                            Golongan
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-two"
                    aria-expanded="false" aria-controls="multi-two">
                    Klasifikasi
                </a>
                <ul id="multi-two" class="sidebar-dropdown list-untyled collapse">
                    <li class="sidebar-item">
                        <a href="{{ route('dashboard-agama-index') }}" class="sidebar-link">
                            Agama
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('dashboard-gender-index') }}" class="sidebar-link">
                            Jenis Kelamin
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="sidebar-item">
        <a href="{{ route('dashboard-article-index') }}" class="sidebar-link">
            <i class="fa-solid fa-newspaper"></i>
            <span>Article</span>
        </a>
    </li>
</ul>
<div class="sidebar-footer">
    <form action="{{ route('dashboard-logout') }}" method="POST" class="sidebar-link-form">
        @csrf
        <button type="submit" class="sidebar-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </button>
    </form>
</div>
