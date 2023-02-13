@extends('layouts.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Kinerja</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/kinerja">Kinerja</a></li>
                        <li class="breadcrumb-item active">Tambah Kinerja</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-white">
                        <div class="card-header">
                            @if (session()->has('success'))
                                <div class="alert alert-success col-lg-8" role="alert">
                                    {{ session('success') }}
                                </div>
                            @elseif (session()->has('danger'))
                                <div class="alert alert-danger col-lg-8" role="alert">
                                    {{ session('danger') }}
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <form action="/kinerja" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_status" value="1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kegiatan Harian</label>

                                    <textarea class="form-control" rows="3" placeholder="Isi Kegiatan Harian" name="kinerja" required autofocus
                                        id="kinerja">{{ old('kinerja') }}</textarea>
                                    @error('kinerja')
                                        <div class="invalid-feedback">
                                            <p class="text-danger"> {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Tanggal Mulai</label>
                                            <div class="input-group" data-target-input="nearest">
                                                <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai"
                                                    max="<?= date('Y-m-d') ?>" value="{{ old('tgl_mulai') }}" />
                                            </div>
                                            @error('tgl_mulai')
                                                <div class="invalid-feedback">
                                                    <p class="text-danger"> {{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label>Tanggal Selesai</label>
                                            <div class="input-group" data-target-input="nearest">
                                                <input type="date" class="form-control"
                                                    name="tgl_selesai"id="tgl_selesai" max="<?= date('Y-m-d') ?>"
                                                    value="{{ old('tgl_selesai') }}" />
                                            </div>
                                            @error('tgl_selesai')
                                                <div class="invalid-feedback">
                                                    <p class="text-danger"> {{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Jam Mulai</label>
                                            <div class="input-group clockpicker" id="clockpicker"
                                                data-target-input="nearest" data-placement="top" data-align="top"
                                                data-autoclose="true">
                                                <input type="time" class="form-control" name="jam_mulai" id="jam_mulai"
                                                    value="{{ old('jam_mulai') }}" />
                                                <div class="input-group-append" data-target="#clock"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('jam_mulai')
                                                <div class="invalid-feedback">
                                                    <p class="text-danger"> {{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label>Jam Selesai</label>
                                            <div class="input-group clockpicker" id="clockpicker"
                                                data-target-input="nearest" data-placement="top" data-align="top"
                                                data-autoclose="true">
                                                <input type="time" class="form-control" name="jam_selesai"
                                                    id="jam_selesai" value="{{ old('jam_selesai') }}" />
                                                <div class="input-group-append" data-target="#clock"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-clock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            @error('jam_selesai')
                                                <div class="invalid-feedback">
                                                    <p class="text-danger"> {{ $message }}</p>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">File Kinerja</label>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('file') is-invalid @enderror" id="InputFile"
                                            name="file" accept=".pdf,.jpg,.jpeg,.png">
                                        <label class="custom-file-label" for="InputFile">Choose
                                            file</label>
                                    </div>
                                    @error('file')
                                        <div class="invalid-feedback">
                                            <p class="text-danger"> {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary" id="btn_save">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
    </section>
    <link rel="stylesheet" type="text/css" href="../../plugins/dist/bootstrap-clockpicker.min.css">

    <script type="text/javascript" src="../../plugins/dist/bootstrap-clockpicker.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../../plugins/dist/jquery-clockpicker.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="../../plugins/dist/bootstrap-clockpicker.min.js"></script>
    <script type="text/javascript">
        $('.clockpicker').clockpicker();
    </script>
    {{-- <script type="text/javascript">
        $("#btn_save").click(function() {
            kinerja = $("kinerja").val();
            tgl_mulai = change_format_date($("#tgl_mulai").val(), 'yyyy-mm-dd');
            tgl_selesai = change_format_date($("#tgl_selesai").val(), 'yyyy-mm-dd');

            tgl_mulai_raw = $("#tgl_mulai").val();
            tgl_selesai_raw = $("#tgl_selesai").val();

            jam_mulai = $("#jam_mulai").val();
            jam_selesai = $("#jam_selesai").val();
            tgl_server = current_date();
            file = $('#file').prop('file')[0];

            waktu_mulai = tgl_mulai + " " + jam_mulai;
            waktu_selesai = tgl_selesai + " " + jam_selesai;

            start_actual_time = new Date(waktu_mulai);
            end_actual_time = new Date(waktu_selesai);
            server_actual_time = new Date();
            diff = end_actual_time - start_actual_time;

            if (kinerja.length <= 0) {
                Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
                    {
                        msg: "Uraian Tugas kosong, mohon lengkapi data tersebut"
                    });
            } else if (tgl_mulai.length <= 0) {
                time_flag = 0;
                Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
                    {
                        msg: "Tanggal mulai kosong, mohon lengkapi data tersebut"
                    });
            } else if (tgl_selesai.length <= 0) {
                time_flag = 0;
                Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
                    {
                        msg: "Tanggal Selesai kosong, mohon lengkapi data tersebut"
                    });
            } else if (jam_mulai.length <= 0) {
                time_flag = 0;
                Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
                    {
                        msg: "Jam mulai kosong, mohon lengkapi data tersebut"
                    });
            } else if (jam_selesai.length <= 0) {
                time_flag = 0;
                Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
                    {
                        msg: "Jam Selesai kosong, mohon lengkapi data tersebut"
                    });
            }
            if (tgl_mulai > tgl_server || tgl_selesai > tgl_server) {
                time_flag = 0;
                Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
                    {
                        msg: "Tanggal tidak boleh melebihi Tanggal server."
                    });
            } else {
                time_flag = 1;
                if (diff < 0) {
                    time_flag = 0;
                    Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
                        {
                            msg: "Tanggal dan jam awal tidak boleh melebihi tanggal dan jam selesai."
                        });
                }
            } else {
                time_flag = 1;
                if (end_actual_time > server_actual_time) {
                    time_flag = 0;
                    Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
                        {
                            msg: "Jam tidak boleh melebihi jam server."
                        });
                } else {
                    if (time_flag == 1) {
                        if (waktu_mulai == waktu_selesai) {
                            Lobibox.alert("warning", //AVAILABLE TYPES: "error", "info", "success", "warning"
                                {
                                    msg: "Tanggal dan jam awal tidak boleh sama dengan tanggal dan jam selesai."
                                });
                        }
                    }
                }
            }
        });

        $(document).ready(function() {
            $('.timerange').datepicker({
                maxDate: new Date,
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                daysOfWeekHighlighted: "0,6"
            });

            $('.clockpicker').clockpicker({
                placement: 'top',
                align: 'left',
                donetext: 'Done'
            });

            $('.timerange-normal').datepicker({
                maxDate: new Date,
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                daysOfWeekHighlighted: "0,6"
            });

            $(".timerange").inputmask("dd-mm-yyyy", {
                "placeholder": "dd-mm-yyyy"
            });

            $('.js-example-basic-single').select2();

        });
    </script> --}}
    <script type="text/javascript">
        function TDate() {
            var TglSelesai = document.getElementById("tgl_selesai").value;
            var ToDate = new Date();

            if (new Date(TglSelesai).getTime() > ToDate.getTime()) {
                alert("Pilih Tanggal Maksimal hari ini!!");
                return false;
            }
            return true;
        }
    </script>

    <script type="text/javascript">
        function JamSelesai() {
            var JamSelesai = document.getElementById("jam_selesai").value;
            var ToDate = now();

            if (JamSelesai > ToDate) {
                alert("Jam Selesai Tidak Boleh Melebihi Waktu Sekarang!!");
                return false;
            }
            return true;
        }
    </script>

    <script>
        function checkform() {
            var dateString = document.purchase.tgl_selesai.value;
            var myDate = new Date(dateString);
            var today = new Date();
            if (document.purchase.tgl_selesai.value == "") {
                //something is wrong
                alert('REQUIRED FIELD ERROR: Please enter date in field!')
                return false;
            } else if (myDate > today) {
                //something else is wrong
                alert('Pilih Tanggal Selesai Maksimal hari ini!!')
                return false;
            }
            // if script gets this far through all of your fields
            // without problems, it's ok and you can submit the form
            return true;
        }
    </script>
@endsection
