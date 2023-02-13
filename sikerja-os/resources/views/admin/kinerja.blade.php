@extends('layouts.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Daftar Kinerja</h3>
                    <h4 class="text-primary">{{ $name[0]['name'] }}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">Persetujuan Kinerja</li>
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
                        <div class="alert alert-success col-lg-8" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('reject'))
                        <div class="alert alert-danger col-lg-8" role="alert">
                            {{ session('reject') }}
                        </div>
                    @endif
                    <table id="example3" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Deskripsi Kegiatan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kinerja as $k)
                                @if (($k->id_sub == auth()->user()->id_sub) == $user->first()->id_sub)
                                    <tr>
                                        <td style="width:2%;">{{ $loop->iteration }}</td>
                                        <td>{{ $k->kinerja }}</td>
                                        <td>{{ $k->tgl_mulai }}</td>
                                        <td>{{ $k->tgl_selesai }} </td>
                                        <td>{{ $k->jam_mulai }}</td>
                                        <td>{{ $k->jam_selesai }}</td>
                                        <td>
                                            @if ($k->file)
                                                <a href="/storage/kinerja-file/{{ $k->file }}" target="_blank"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-eye"></i></a>
                                            @else
                                                <p>No File</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($k->id_status === 1)
                                                <a href="/hitung/setuju/{{ $k->id }}"
                                                    class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#tolak{{ $k->id }}"><i
                                                        class="fas fa-eject"></i></button>
                                                {{-- <a href="/hitung/tolak/{{ $k->id }}"
                                                    class="btn btn-danger btn-sm"><i class="fas fa-eject"
                                                        onclick="coment()"></i></a> --}}
                                            @else
                                            @endif
                                        </td>
                                    </tr>
                                @endif
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
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </section>

    {{-- Modal Tambah Comment Kinerja --}}
    @foreach ($kinerja as $k)
        <div class="modal fade" id="tambah{{ $k->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Komentar</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/hitung/setuju/{{ $k->id }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="col-md-12">
                                <label for="subdit">{{ $k->kinerja }}</label>
                                <div class="input-group">
                                    <input type="text" name="comment" class="form-control" value="{{ old('comment') }}"
                                        placeholder="Komentar atas Deskripsi Kinerja">
                                </div>
                                @error('comment')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tolak Kinerja</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{-- Modal Comment Tolak Kinerja --}}
    @foreach ($kinerja as $k)
        <div class="modal fade" id="tolak{{ $k->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Alasan Kinerja Ditolak</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/hitung/tolak/{{ $k->id }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="col-md-12">
                                <label for="subdit">Komentar</label>
                                <div class="input-group">
                                    <input type="text" name="comment" class="form-control" value="{{ old('comment') }}">
                                </div>
                                @error('comment')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tolak Kinerja</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
