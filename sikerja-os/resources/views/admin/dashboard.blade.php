@extends('layouts.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0">Lihat Dashboard Kinerja</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard Kinerja</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="card card-white">
                        <div class="card card-header">
                            <h5 class="card-title">Pilih Nama</h5>
                        </div>
                        <div class="card-body">
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
                            @foreach ($user as $u)
                                @if (auth()->user()->id_sub == $u->id_sub)
                                    @if (auth()->user()->id != $u->id)
                                        <button data-toggle="modal"
                                            data-target="#lihat{{ $u->id }}"class="btn btn-default">
                                            <i class="fas fa-eye"></i>{{ $u->name }}</button>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Modal Lihat Dashboard --}}
    @foreach ($user as $u)
        <div class="modal fade modal-large" id="lihat{{ $u->id }}">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            @if (($id_sub === auth()->user()->id_sub) == $u->id_sub)
                                {{ $u->name }}
                            @endif
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">Diagram Kinerja</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="demo-gauge" style="width: 600px;">
                                            <h3 class="text text-center text-bold">
                                                {{ round(abs($hitung / 6600) * 100) }}%
                                            </h3>
                                            <div id="gauge" style="float: center;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 align-self-center">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">Pekerjaan Belum Diperiksa</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h2 class="text text-bold text-center">
                                        {{ $belum }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 align-self-center">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">Realisasi Menit Kerja Efektif</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h2 class="text text-bold text-center">{{ $hitung }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
