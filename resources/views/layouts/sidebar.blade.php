<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url(auth()->user()->foto ?? '') }}" class="img-circle img-profil" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            @if (auth()->user()->level == 1)
            <li class="header">DATA MASTER</li>
            <li>
                <a href="{{ route('menu.index') }}">
                    <i class="fa fa-coffee"></i> <span>Menu</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kategori.index') }}">
                    <i class="fa fa-bank"></i> <span>Kategori</span>
                </a>
            </li>
            <li>
                <a href="{{ route('jabatan.index') }}">
                    <i class="fa fa-briefcase"></i> <span>Jabatan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('event.index') }}">
                    <i class="fa fa-briefcase"></i> <span>Event</span>
                </a>
            </li>
            <li>
                <a href="{{ route('gallery.index') }}">
                    <i class="fa fa-building"></i> <span>Galley</span>
                </a>
            </li>
            <li>
                <a href="{{ route('testimoni.index') }}">
                    <i class="fa fa-building"></i> <span>Testimoni</span>
                </a>
            </li>
            <li>
                <a href="{{ route('about.index') }}">
                    <i class="fa fa-building"></i> <span>About</span>
                </a>
            </li>
            <li>
                <a href="{{ route('staff.index') }}">
                    <i class="fa fa-id-card"></i> <span>Staff</span>
                </a>
            </li>
            {{-- <li class="header">DATA KADER</li>
            <li>
                <a href="{{ route('biodata.index') }}">
                    <i class="fa fa-id-card"></i> <span>Biodata</span>
                </a>
            </li>
            <li>
                <a href="{{ route('sk.index') }}">
                    <i class="fa fa-file"></i> <span>Data SK</span>
                </a>
            </li>
            <li class="header">KEUANGAN</li>
            <li>
                <a href="{{ route('penjualan.index') }}">
                    <i class="fa fa-upload"></i> <span>Perhutungan Honor</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.index') }}">
                    <i class="fa fa-money"></i> <span>Payroll</span>
                </a>
            </li> --}}
            {{-- <li>
                <a href="{{ route('transaksi.baru') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Baru</span>
                </a>
            </li> --}}
            {{-- <li class="header">REPORT</li>
            <li>
                <a href="{{ route('laporan.index') }}">
                    <i class="fa fa-file-pdf-o"></i> <span>Laporan</span>
                </a>
            </li> --}}
            <li class="header">SYSTEM</li>
            <li>
                <a href="{{ route('user.index') }}">
                    <i class="fa fa-users"></i> <span>User</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('setting.index') }}">
                    <i class="fa fa-cogs"></i> <span>Pengaturan</span>
                </a>
            </li> --}}
            @else
            <li>
                <a href="{{ route('transaksi.index') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Aktif</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.baru') }}">
                    <i class="fa fa-cart-arrow-down"></i> <span>Transaksi Baru</span>
                </a>
            </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>