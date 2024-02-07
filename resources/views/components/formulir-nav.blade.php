<div class="card card-animate">
    <div class="card-body">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('formulir.index') ? 'active' : '' }}" href="{{ route('formulir.index', $encryptRegistNumber) }}">Biodata</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('formulir.alamat') ? 'active' : '' }}" href="{{ route('formulir.alamat', $encryptRegistNumber) }}">Alamat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('formulir.kerja') ? 'active' : '' }}" href="{{ route('formulir.kerja', $encryptRegistNumber) }}">Pekerjaan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('formulir.ayah') ? 'active' : '' }}" href="{{ route('formulir.ayah', $encryptRegistNumber) }}">Data Ayah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('formulir.ibu') ? 'active' : '' }}" href="{{ route('formulir.ibu', $encryptRegistNumber) }}">Data Ibu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('formulir.wali') ? 'active' : '' }}" href="{{ route('formulir.wali', $encryptRegistNumber) }}">Data Wali</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('formulir.lampiran') ? 'active' : '' }}" href="{{ route('formulir.lampiran', $encryptRegistNumber) }}">Lampiran</a>
            </li>
        </ul>
    </div>
</div>
