@extends('layouts.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Sub Bagian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Daftar Sub Bagian</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-white card-mb-10">
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success col-lg-8" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <button type="button" class="btn btn-primary btn-md-6" data-toggle="modal" data-target="#tambah"><i
                            class="fas fa-plus"></i>Tambah
                        Sub Bagian Unit Kerja
                    </button>
                    <table id="example3" class="table table-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sub Bagian Unit Kerja</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subdit as $s)
                                <tr>
                                    <td style="width:1%;">{{ $loop->iteration }}</td>
                                    <td style="width:9%;">{{ $s->subdit }}</td>
                                    <td style="width:2%;">
                                        <button data-toggle="modal" data-target="#edit{{ $s->id }}"
                                            class="btn btn-success btn-sm"><i class="fas fa-pen"></i></button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#hapus{{ $s->id }}"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Sub Bagian Unit Kerja</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Tambah Sub Bagian --}}
    <div class="modal fade" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Sub Bagian Unit Kerja</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/subdit" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="subdit">Nama Sub Bagian</label>
                            <div class="input-group">
                                <input type="text" name="subdit" class="form-control" value="{{ old('subdit') }}">
                            </div>
                            @error('subdit')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Edit Sub Bagian --}}
    @foreach ($subdit as $s)
        <div class="modal fade" id="edit{{ $s->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Nama Sub Bagian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/subdit/{{ $s->id }}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="col-md-12">
                                <label for="subdit">Nama Subdit</label>
                                <div class="input-group">
                                    <input type="text" name="subdit" class="form-control"
                                        value="{{ old('subdit', $s->subdit) }}">
                                </div>
                                @error('subdit')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{-- Modal Hapus Sub Bagian --}}
    @foreach ($subdit as $s)
        <div class="modal fade" id="hapus{{ $s->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Sub Bagian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/subdit/{{ $s->id }}" method="post">
                        @method('delete')
                        @csrf
                        <div class="modal-body">
                            <div class="col-md-12">
                                <label for="subdit">Anda Yakin ingin menghapus Sub Bagian ini ?</label>
                                <div class="input-group">
                                    <input type="text" name="subdit" class="form-control"
                                        value="{{ old('subdit', $s->subdit) }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
