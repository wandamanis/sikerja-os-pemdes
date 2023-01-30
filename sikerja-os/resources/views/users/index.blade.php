@extends('layouts.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
            <a href="/users/create" type="button" class="btn btn-primary btn-md-6"><i class="fas fa-user-plus"></i>Tambah
                Pengguna
            </a>
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
                    <table id="example1" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Action</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Unit Kerja</th>
                                <th>Sub Bagian</th>
                                <th>Level User</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                                <tr>
                                    <td style="width:2%;">{{ $loop->iteration }}</td>
                                    <td style="width:10%;">
                                        <a href="/users/{{ $u->id }}/edit" class="btn btn-success btn-sm"><i
                                                class="fas fa-pen"></i></a>
                                        <form action="/users/{{ $u->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin Ingin Menghapus User ini ?')"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        @if ($u->foto)
                                            <a href="/storage/user-image/{{ $u->foto }}" target="_blank"
                                                class="d-block">
                                                <img src="{{ asset('storage/user-image/' . $u->foto) }}"
                                                    alt="{{ $u->name }}"
                                                    class="profile-user-img img-fluid mt-3img-circle" style="width:80px">
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{ $u->name }}</td>
                                    <td>
                                        @foreach ($jabatan as $j)
                                            @if ($u->id_jab == $j->id)
                                                {{ $j->jabatan }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($unit as $un)
                                            @if ($u->id_unit == $un->id)
                                                {{ $un->unit }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($subdit as $s)
                                            @if ($u->id_sub == $s->id)
                                                {{ $s->subdit }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($level as $l)
                                            @if ($u->id_level == $l->id)
                                                {{ $l->level }}
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Action</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Unit Kerja</th>
                                <th>Sub Bagian</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
