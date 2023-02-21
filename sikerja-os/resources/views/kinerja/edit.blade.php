@extends('layouts.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Kinerja</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/kinerja">Kinerja</a></li>
                        <li class="breadcrumb-item active">Edit Kinerja</li>
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

                            <form action="/kinerja/{{ $kinerjas->id }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <input type="hidden" name="id_status" value="1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kegiatan Harian</label>
                                    <input type="hidden" name="id" value="{{ $kinerjas->id }}">
                                    <textarea class="form-control @error('kinerja') is-invalid @enderror" rows="3" name="kinerja"
                                        value="{{ old('kinerja', $kinerjas->kinerja) }}" required>{{ $kinerjas->kinerja }}</textarea>
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
                                                    max="<?= date('Y-m-d') ?>" value="{{ old('tgl_mulai', $kinerjas->tgl_mulai) }}" />
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
                                                    value="{{ old('tgl_selesai',$kinerjas->tgl_selesai) }}" />
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
                                                    value="{{ old('jam_mulai',$kinerjas->jam_mulai) }}" />
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
                                                    id="jam_selesai" value="{{ old('jam_selesai',$kinerjas->jam_selesai) }}" />
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
                                    <input type="hidden" name="oldFile" value="{{ $kinerjas->file }}">
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('file') is-invalid @enderror" id="InputFile"
                                            name="file" value="{{ old('file', $kinerjas->file) }}">
                                        <label class="custom-file-label" for="InputFile">{{ $kinerjas->file }}</label>
                                    </div>
                                    @error('file')
                                        <div class="invalid-feedback">
                                            <p class="text-danger"> {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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


@endsection
