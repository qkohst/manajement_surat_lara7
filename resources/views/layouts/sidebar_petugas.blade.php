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
        <li class="nav-item has-treeview {{ Route::is('suratmasuk.*') ? ' menu-open' : '' }} {{ Route::is('suratkeluar.*') ? ' menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::is('suratmasuk.*') ? 'active' : '' }} {{ Route::is('suratkeluar.*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-mail-bulk"></i>
                <p>
                    Transaksi Surat
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('suratmasuk.index') }}" class="nav-link {{ Route::is('suratmasuk.*') ? 'active' : '' }}">
                        <i class="far fa-envelope nav-icon"></i>
                        <p>Surat Masuk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('suratkeluar.index') }}" class="nav-link {{ Route::is('suratkeluar.*') ? 'active' : '' }}">
                        <i class="far fa-envelope-open nav-icon"></i>
                        <p>Surat Keluar</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{ Route::is('agendamasuk.index') ? ' menu-open' : '' }} {{ Route::is('agendakeluar.index') ? ' menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::is('agendamasuk.index') ? 'active' : '' }} {{ Route::is('agendakeluar.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Buku Agenda
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('agendamasuk.index') }}" class="nav-link {{ Route::is('agendamasuk.index') ? 'active' : '' }}">
                        <i class="far fa-envelope nav-icon"></i>
                        <p>Agenda Surat Masuk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('agendakeluar.index') }}" class="nav-link {{ Route::is('agendakeluar.index') ? 'active' : '' }}">
                        <i class="far fa-envelope-open nav-icon"></i>
                        <p>Agenda Surat Keluar</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{ Route::is('galeri.suratmasuk') ? ' menu-open' : '' }} {{ Route::is('galeri.suratkeluar') ? ' menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::is('galeri.suratmasuk') ? 'active' : '' }} {{ Route::is('galeri.suratkeluar') ? 'active' : '' }}">
                <i class="nav-icon fas fa-images"></i>
                <p>
                    Galeri File
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('galeri.suratmasuk') }}" class="nav-link {{ Route::is('galeri.suratmasuk') ? 'active' : '' }}">
                        <i class="fas fa-sign-in-alt nav-icon"></i>
                        <p>File Surat Masuk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('galeri.suratkeluar') }}" class="nav-link {{ Route::is('galeri.suratkeluar') ? 'active' : '' }}">
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
    </ul>
</nav>