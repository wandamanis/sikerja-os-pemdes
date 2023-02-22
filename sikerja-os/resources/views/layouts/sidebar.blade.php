<a href="index3.html" class="brand-link">
    <span class="brand-text font-weight-light">SIKERJA PEMDES</span>
    <img src="/dist/img/SikerjaPemdes.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="width:50px height:80px">
</a>

<div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('storage/user-image/' . auth()->user()->foto) }}" class="img-square" alt="User Image"
                style="width:80px">
        </div>
        <div class="info">
            <a href="#" class="d-block">
                {{ auth()->user()->name }}
            </a>
            <p class="text text-secondary">
                @foreach ($unit as $un)
                    @if ($un->id == auth()->user()->id_unit)
                        {{ $un->unit }}
                    @endif
                @endforeach
                <br>
                @foreach ($jabatan as $j)
                    @if ($j->id == auth()->user()->id_jab)
                        {{ $j->jabatan }}
                    @endif
                @endforeach
            </p>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if (auth()->user()->id_level === 3)
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="/kinerja" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Kinerja
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/kinerja" class="nav-link {{ Request::is('kinerja') ? 'active' : '' }}">
                                <i class="fas fa-th nav-icon"></i>
                                <p>Lihat Kinerja</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/kinerja/create"
                                class="nav-link {{ Request::is('kinerja/create') ? 'active' : '' }}">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Tambah Kinerja</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/tolak/kinerja"
                                class="nav-link {{ Request::is('tolak/kinerja') ? 'active' : '' }}">
                                <i class="fas fa-eject nav-icon"></i>
                                <p>Kinerja Ditolak</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/print/kinerja" class="nav-link {{ Request::is('print/kinerja') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-hand-pointer"></i>
                        <p>
                            Rekap Absen
                        </p>
                    </a>
                </li>
            @endif
            @can('admin')
                <li class="nav-item">
                    <a href="/admin" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="/show/admin/kinerja" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Dashboard Kinerja
                        </p>
                    </a>
                </li> --}}
            @endcan

            @can('superadmin')
                <li class="nav-item">
                    <a href="/superadmin" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/jabatan" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Jabatan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/level" class="nav-link">
                        <i class="nav-icon fas fa-code"></i>
                        <p>
                            Level
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/unit" class="nav-link">
                        <i class="nav-icon fas fa-landmark"></i>
                        <p>
                            Unit Kerja
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/subdit" class="nav-link">
                        <i class="nav-icon fas fa-landmark"></i>
                        <p>
                            Sub Bagian
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/users" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
            @endcan
            <li class="nav-header">PROFIL</li>
            <li class="nav-item">
                <a href="/profil/{{ auth()->user()->id }}" class="nav-link {{ Request::is('profil/') ? 'active' : '' }}">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                        Lihat Profil
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/profil/ubah-password/{{ auth()->user()->id }}" class="nav-link {{ Request::is('profil/ubah-password/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-key"></i>
                    <p>
                        Ganti Password
                    </p>
                </a>
            </li>
        </ul>
    </nav>

</div>
