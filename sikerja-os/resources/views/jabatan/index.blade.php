@extends('layouts.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Jabatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Daftar Jabatan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-white">
                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success col-lg-8" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <button type="button" class="btn btn-primary btn-md-6" data-toggle="modal" data-target="#tambah"><i
                            class="fas fa-plus"></i>Tambah
                        Jabatan
                    </button>
                    <table id="example3" class="table table-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jabatan as $j)
                                <tr>
                                    <td style="width:1%;">{{ $loop->iteration }}</td>
                                    <td style="width:9%;">{{ $j->jabatan }}</td>
                                    <td style="width:2%;">
                                        <button data-toggle="modal" data-target="#edit{{ $j->id }}"
                                            class="btn btn-success btn-sm"><i class="fas fa-pen"></i></button>
                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#hapus{{ $j->id }}"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
    {{-- Modal Tambah Jabatan --}}
    <div class="modal fade" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Daftar Jabatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/jabatan" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="name">Nama Jabatan</label>
                            <div class="input-group">
                                <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}">
                            </div>
                            @error('jabatan')
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
    {{-- Modal Edit Jabatan --}}
    @foreach ($jabatan as $j)
        <div class="modal fade" id="edit{{ $j->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Nama Jabatan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/jabatan/{{ $j->id }}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="col-md-12">
                                <label for="name">Nama Jabatan</label>
                                <div class="input-group">
                                    <input type="text" name="jabatan" class="form-control"
                                        value="{{ old('jabatan', $j->jabatan) }}">
                                </div>
                                @error('jabatan')
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
    {{-- Modal Hapus Jabatan --}}
    @foreach ($jabatan as $j)
        <div class="modal fade" id="hapus{{ $j->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Jabatan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/jabatan/{{ $j->id }}" method="post">
                        @method('delete')
                        @csrf
                        <div class="modal-body">
                            <div class="col-md-12">
                                <label for="jabatan">Anda Yakin ingin menghapus Jabatan ini ?</label>
                                <div class="input-group">
                                    <input type="text" name="jabatan" class="form-control"
                                        value="{{ old('jabatan', $j->jabatan) }}" disabled>
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
