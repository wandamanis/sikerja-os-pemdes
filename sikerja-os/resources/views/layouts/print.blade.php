<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Laporan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .line {
            border-bottom: 5px solid black;
            margin-top: 5px;
            width: 90%;
        }

        .judul {
            font-weight: bold;
            font-style: normal;
            font-size: 30px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .alamat {
            font-style: normal;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .nama {
            font-style: normal;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
            padding-left: -10px;
            margin-left: -70px;
        }

        .tabel1 {
            font-style: normal;
            font-size: 20px;
            font-family: Arial, Helvetica, sans-serif;
            margin-right: 50px;
            border-collapse: collapse;
            border: 1px solid;
            max-width: 91%;
        }

        .judul2 {
            font-weight: bold;
            font-style: normal;
            font-size: 25px;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 30px;
            vertical-align: top;
        }

        .row1 {
            margin-top: 50px;
        }

        .row2 {
            margin-top: 0px;
        }

        .row3 {
            margin-top: 30px;
        }

        .row4 {
            margin-top: 500px;
        }
    </style>
</head>

<body>
    <div class="container-lg">
        <div class="row">
            <div class="col-md-2">
                <img src="dist/img/kemendagri.png" alt="logo">
            </div>
            <div class="col-md-8">
                <h3 class="judul text-center">KEMENTERIAN DALAM NEGERI</h3>
                <h3 class="judul text-center">REPUBLIK INDONESIA</h3>
                <h3 class="judul text-center">DIREKTORAT JENDERAL</h3>
                <h3 class="judul text-center">BINA PEMERINTAHAN DESA</h3>
                <h5 class="alamat text-center">Jl. Raya Pasar Minggu No.19, RT.7/RW.1, Pejaten Barat, Ps. Minggu, Kota
                    Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12510 www.binapemdes.kemendagri.go.id</h5>
            </div>
            <div class="line"></div>
        </div>
        <div class="row">
            <h5 class="judul2 text-center"> LAPORAN KEGIATAN HARIAN</h5>
        </div>
        <div class="row row1">
            <div class="col-md-2">
                <h5 class="alamat">NAMA</h5>
            </div>
            <div class="col-md-1">:</div>
            <div class="col-md-9">
                <h5 class="nama">
                    NAMA NAMA
                </h5>
            </div>
        </div>
        <div class="row row2">
            <div class="col-md-2">
                <h5 class="alamat">JABATAN</h5>
            </div>
            <div class="col-md-1">:</div>
            <div class="col-md-9">
                <h5 class="nama">
                    JABATAN JABATAN
                </h5>
            </div>
        </div>
        <div class="row row2">
            <div class="col-md-2">
                <h5 class="alamat">TEMPAT TUGAS</h5>
            </div>
            <div class="col-md-1">:</div>
            <div class="col-md-9">
                <h5 class="nama">
                    TEMPAT TUGAS TEMPAT TUGAS
                </h5>
            </div>
        </div>
        <div class="row row2">
            <div class="col-md-2">
                <h5 class="alamat">BULAN</h5>
            </div>
            <div class="col-md-1">:</div>
            <div class="col-md-9">
                <h5 class="nama">
                    BULAN BULAN
                </h5>
            </div>
        </div>

        <div class="row row3">
            <table class="table tabel1 table-bordered border-collapse">
                <thead>
                    <tr>
                        <th>Hari/Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Kegiatan</th>
                        <th>Komentar Atasan Langsung</th>
                        <th>Paraf</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row row4">
            <div class="position-relative" style="max-width: 91%;">
                <div class="position-absolute bottom-0 end-0">
                    <h5 class="nama">Direktur Evaluasi Perkembangan Desa</h5> <br>
                    <br><br><br>
                    <h5 class="nama"> Mohamad Noval, ST</h5>
                    <h5 class="nama"> Pangkat/Gol</h5>
                    <h5 class="nama">NIP</h5>

                </div>
            </div>
        </div>

    </div>

</body>

</html>
