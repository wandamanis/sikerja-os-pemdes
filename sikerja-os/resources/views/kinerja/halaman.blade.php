<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Kinerja
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .line {
            border-bottom: 3px solid black;
            margin-top: -5px;
            margin-left: 12px;
            width: 95%;
        }

        .judul {
            font-weight: bold;
            font-style: normal;
            font-size: 24px;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 5px;
            word-spacing: 15px;
            text-align: center;
        }

        .judul1 {
            font-weight: bold;
            font-style: normal;
            font-size: 24px;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: -8px;
            word-spacing: 15px;
        }

        .judul2 {
            font-weight: bold;
            font-style: normal;
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 20px;
        }

        .judul3 {
            font-weight: bold;
            font-style: normal;
            font-size: 25px;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 30px;
            vertical-align: top;
        }

        .alamat {
            font-style: normal;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: -5px;
        }

        .nama {
            font-style: normal;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
            padding-left: -10px;
            margin-left: -70px;
        }

        .nama1 {
            font-style: normal;
            font-size: 16px;
            font-family: Arial, Helvetica, sans-serif;
            padding-left: -10px;
            margin-left: -70px;
            text-transform: uppercase;
        }

        .nama2 {
            font-style: normal;
            font-size: 16px;
            font-family: Arial, Helvetica, sans-serif;
            padding-left: -10px;
            margin-left: 0px;
        }

        .tabel1 {
            font-style: normal;
            font-size: 16px;
            font-family: Arial, Helvetica, sans-serif;
            margin-right: -50px;
            margin-left: 12px;
            border-collapse: collapse;
            border: 1px solid;
            max-width: 91%;
            width: 100%;
        }

        .th {
            height: 20px
        }

        .tr {
            height: 10px
        }

        .row1 {
            margin-top: 30px;
            margin-left: 8px;
        }

        .row2 {
            margin-top: 0px;
            margin-left: 8px;
        }

        .row3 {
            margin-top: 30px;
            margin-left: 8px;
        }

        .row4 {
            margin-top: 500px;
            margin-left: 8px;
        }

        .logo {
            margin-left: 0px;
            width: 120px;
            height: 150px;
        }
    </style>
</head>

<body>
    <div class="container-lg">
        <div class="card card-white border-0">
            <div class="header">
                <div class="row">
                    <div class="col-md-2">
                        <img src="/dist/img/kemendagri.png" alt="logo" class="logo">
                    </div>
                    <div class="col-md-8">
                        <h3 class="judul text-center">KEMENTERIAN DALAM NEGERI</h3>
                        <h3 class="judul1 text-center">REPUBLIK INDONESIA</h3>
                        <h3 class="judul1 text-center">DIREKTORAT JENDERAL</h3>
                        <h3 class="judul1 text-center">BINA PEMERINTAHAN DESA</h3>
                        <h5 class="alamat text-center">Jl. Raya Pasar Minggu No.19, Jakarta Selatan, 12510, Telp
                            021-7942373-74
                        </h5>
                    </div>
                    <div class="line"></div>
                </div>
            </div>

            <div class="row">
                <h5 class="judul2 text-center"> LAPORAN KEGIATAN HARIAN</h5>
            </div>
            <div class="row row1">
                <div class="col-md-2">
                    <h5 class="nama2">NAMA</h5>
                </div>
                <div class="col-md-1">:</div>
                <div class="col-md-9">
                    <h5 class="nama1">
                        {{ auth()->user()->name }}
                    </h5>
                </div>
            </div>
            <div class="row row2">
                <div class="col-md-2">
                    <h5 class="nama2">JABATAN</h5>
                </div>
                <div class="col-md-1">:</div>
                <div class="col-md-9">
                    <h5 class="nama1">
                        @foreach ($jabatan as $j)
                            @if (auth()->user()->id_jab === $j->id)
                                {{ $j->jabatan }}
                            @endif
                        @endforeach
                    </h5>
                </div>
            </div>
            <div class="row row2">
                <div class="col-md-2">
                    <h5 class="nama2">TEMPAT TUGAS</h5>
                </div>
                <div class="col-md-1">:</div>
                <div class="col-md-9">
                    <h5 class="nama1">
                        @foreach ($subdit as $s)
                            @if (auth()->user()->id_sub === $s->id)
                                {{ $s->subdit }}
                            @endif
                        @endforeach
                    </h5>
                </div>
            </div>
            <div class="row row2">
                <div class="col-md-2">
                    <h5 class="nama2">BULAN</h5>
                </div>
                <div class="col-md-1">:</div>
                <div class="col-md-9">
                    <h5 class="nama1">
                        @if ($bulan == 1)
                            Januari {{ $tahun }}
                        @elseif ($bulan == 2)
                            Februari {{ $tahun }}
                        @endif
                    </h5>
                </div>
            </div>

            <div class="row row3">
                <div style="overflow-x:auto;">
                    <table class="table tabel1 table-bordered border-collapse nama">
                        <thead class="th">
                            <tr>
                                <th>Hari/Tanggal</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Kegiatan</th>
                                <th>Komentar Atasan Langsung</th>
                                <th>Paraf</th>
                            </tr>
                        </thead>
                        <tbody class="tr">
                            @foreach ($kinerja as $k)
                                @if (auth()->user()->id === $k->id_user)
                                    @if ($k->id_status === 2)
                                        <tr>
                                            <td>{{ $k->tgl_mulai }}</td>
                                            <td>{{ $k->jam_mulai }}</td>
                                            <td>{{ $k->jam_selesai }}</td>
                                            <td>{{ $k->kinerja }}</td>
                                            <td>{{ $k->comment }}</td>
                                            <td>{{ $k->created_at }}</td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row row4">
                <div class="position-relative" style="max-width: 91%;">
                    <div class="position-absolute bottom-0 end-0">
                        <h5 class="nama">
                            @foreach ($user as $u)
                                @if ($u->id_level === 2)
                                    @if (auth()->user()->id_unit === $u->id_unit)
                                        @if ($u->id_unit === $unit->first()->id)
                                            {{ $unit->first()->unit }}
                                        @endif
                                    @endif
                                @endif
                            @endforeach
                        </h5> <br>
                        <br><br><br>
                        <h5 class="nama">
                            @foreach ($user as $u)
                                @if ($u->id_level === 2)
                                    @if (auth()->user()->id_unit === $u->id_unit)
                                        {{ $u->name }}
                                    @endif
                                @endif
                            @endforeach
                        </h5>
                        <h5 class="nama"> Pangkat/Gol</h5>
                        <h5 class="nama">NIP</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
