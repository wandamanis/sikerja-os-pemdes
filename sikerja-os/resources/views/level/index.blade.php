@extends('layouts.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Level User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Level User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-white">
                        <div class="card-body">

                            @if (session()->has('success'))
                                <div class="alert alert-success col-lg-8" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <button type="button" class="btn btn-primary btn-md-6" data-toggle="modal"
                                data-target="#tambah"><i class="fas fa-plus"></i>Tambah
                                Level User
                            </button>
                            <table id="example3" class="table table-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Level User</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($level as $l)
                                        <tr>
                                            <td style="width:1%;">{{ $loop->iteration }}</td>
                                            <td style="width:9%;">{{ $l->level }}</td>
                                            <td style="width:2%;">
                                                @if ($l->id >= 4)
                                                    <button data-toggle="modal" data-target="#edit{{ $l->id }}"
                                                        class="btn btn-success btn-sm"><i class="fas fa-pen"></i></button>
                                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#hapus{{ $l->id }}"><i
                                                            class="fas fa-trash"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Level User</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah Level --}}
    <div class="modal fade" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Level User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/level" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="level">Level</label>
                            <div class="input-group">
                                <input type="text" name="level" class="form-control" value="{{ old('level') }}">
                            </div>
                            @error('level')
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
    {{-- Modal Edit Level --}}
    @foreach ($level as $l)
        <div class="modal fade" id="edit{{ $l->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Nama Level</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/level/{{ $l->id }}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="col-md-12">
                                <label for="level">Nama Level</label>
                                <div class="input-group">
                                    <input type="text" name="level" class="form-control"
                                        value="{{ old('level', $l->level) }}">
                                </div>
                                @error('level')
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
    {{-- Modal Hapus Level --}}
    @foreach ($level as $l)
        <div class="modal fade" id="hapus{{ $l->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Level</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/level/{{ $l->id }}" method="post">
                        @method('delete')
                        @csrf
                        <div class="modal-body">
                            <div class="col-md-12">
                                <label for="level">Anda Yakin ingin menghapus Level User ini ?</label>
                                <div class="input-group">
                                    <input type="text" name="level" class="form-control"
                                        value="{{ old('level', $l->level) }}" disabled>
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
