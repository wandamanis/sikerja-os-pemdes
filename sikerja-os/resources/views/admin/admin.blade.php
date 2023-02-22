@extends('layouts.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Welcome {{ auth()->user()->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
                        <div class="card-body" style="overflow-x:auto;">
                            @if (session()->has('success'))
                                <div class="alert alert-success col-lg-8" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <table id="example3" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Belum Disetujui</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $u)
                                        @if (auth()->user()->id_sub == $u->id_sub)
                                            @if (auth()->user()->id != $u->id)
                                                <tr>
                                                    <td style="width:10%;">
                                                        {{ $u->name }}
                                                    </td>
                                                    <td style="width:2%;">
                                                        {{ $result = count($kinerja->where('id_user', $u->id)->where('id_status', 1)) }}
                                                    </td>
                                                    <td style="width:2%;">
                                                        <a href="/admin/lihat-kinerja/{{ $u->id }}"
                                                            class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>
                                                            Lihat
                                                            Kinerja</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Belum Disetujui</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
