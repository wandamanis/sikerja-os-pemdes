@extends('layouts.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Kinerja</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Kinerja</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-white">
                <div class="card-body" style="overflow-x:auto;">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table id="example1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Deskripsi Kegiatan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Komentar Atasan Langsung</th>
                                <th>Status</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kinerja as $k)
                                <tr>
                                    <td style="width:2%;">{{ $loop->iteration }}</td>
                                    <td>{{ $k->kinerja }}</td>
                                    <td>{{ $k->tgl_mulai }}</td>
                                    <td>{{ $k->tgl_selesai }} </td>
                                    <td>{{ $k->jam_mulai }}</td>
                                    <td>{{ $k->jam_selesai }}</td>
                                    <td>{{ $k->comment }}</td>
                                    <td>
                                        @foreach ($status as $s)
                                            @if ($k->id_status == $s->id)
                                                {{ $s->status }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($k->file)
                                            <a href="/storage/kinerja-file/{{ $k->file }}" target="_blank"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i></a>
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        @if ($k->id_status === 1)
                                            <a href="/kinerja/{{ $k->id }}/edit" class="btn btn-success btn-sm"><i
                                                    class="fas fa-pen"></i></a>

                                            <form action="/kinerja/{{ $k->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin Ingin Menghapus Kinerja ini ?')"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Deskripsi Kegiatan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Komentar Atasan Langsung</th>
                                <th>Status</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </section>
@endsection
