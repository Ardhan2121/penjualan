<div class="main-sidebar sidebar-style-2" style="overflow: hidden; outline: none;" tabindex="1">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">METIK</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">MTK</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li>
                <a class="nav-link" href="/"><i class="fas fa-home"></i> <span>Menu Utama</span></a>
            </li>
            @if (Auth::user()->hak == 'admin')
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i><span>Master</span></a>
                    <ul class="dropdown-menu">
                        <li class=" {{ Route::currentRouteName() == 'pelanggan.index' ? 'active' : '' }}"><a class="nav-link" href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
                        <li class=" {{ Route::currentRouteName() == 'barang.index' ? 'active' : '' }}"><a class="nav-link" href="{{ route('barang.index') }}">Barang</a></li>
                        <li class="{{ Route::currentRouteName() == 'user.create' ? 'active' : '' }}"><a class="nav-link" href="{{ route('user.create') }}"><span>User</span></a></li>
                    </ul>
                </li>
            @endif
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-exchange-alt"></i><span>Transaksi</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Route::currentRouteName() == 'transaksi.create' ? 'active' : '' }}"><a class="nav-link" href="{{ route('transaksi.create') }}"><span>Buat Pesanan</span></a></li>
                    <li class="{{ Route::currentRouteName() == 'nota.create' ? 'active' : '' }}"><a class="nav-link" href="{{ route('nota.create') }}"><span>Cetak Nota</span></a></li>
                </ul>
            </li>
            <li>
                <a class="nav-link" href="{{ route('laporan.index') }}"><i class="fas fa-chart-bar"></i> <span>Laporan</span></a>
            </li>
        </ul>
    </aside>
</div>
