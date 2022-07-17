<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-mail-bulk"></i>
                <p>
                    Transaksi Surat
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/suratmasuk/index" class="nav-link">
                        <i class="far fa-envelope nav-icon"></i>
                        <p>Surat Masuk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/suratkeluar/index" class="nav-link">
                        <i class="far fa-envelope-open nav-icon"></i>
                        <p>Surat Keluar</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Buku Agenda
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/suratmasuk/agenda" class="nav-link">
                        <i class="far fa-envelope nav-icon"></i>
                        <p>Agenda Surat Masuk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/suratkeluar/agenda" class="nav-link">
                        <i class="far fa-envelope-open nav-icon"></i>
                        <p>Agenda Surat Keluar</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-images"></i>
                <p>
                    Galeri File
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/suratmasuk/galeri" class="nav-link">
                        <i class="fas fa-sign-in-alt nav-icon"></i>
                        <p>File Surat Masuk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/suratkeluar/galeri" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>File Surat Keluar</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ route('klasifikasi.index') }}" class="nav-link {{ Route::is('klasifikasi.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>
                    Klasifikasi
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview {{ Route::is('user.*') ? ' menu-open' : '' }} {{ Route::is('instansi.*') ? ' menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::is('user.*') ? 'active' : '' }} {{ Route::is('instansi.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                    Pengaturan
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('instansi.index') }}" class="nav-link {{ Route::is('instansi.*') ? 'active' : '' }}">
                        <i class="fas fa-warehouse nav-icon"></i>
                        <p>Manajemen Instansi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link {{ Route::is('user.*') ? 'active' : '' }}">
                        <i class="fas fa-users-cog nav-icon"></i>
                        <p>Manajemen Pengguna </p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>