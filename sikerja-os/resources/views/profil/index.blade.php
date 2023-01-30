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
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ol>
                </div>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success col-lg-8" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-white card-outline">
                        <div class="card-body box profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-square"
                                    src="{{ asset('storage/user-image/' . auth()->user()->foto) }}"
                                    alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
                            <p class="text-muted text-center">
                                @foreach ($jabatan as $j)
                                    @if ($j->id == auth()->user()->id_jab)
                                        {{ $j->jabatan }}
                                    @endif
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profil</h3>
                        </div>

                        <div class="card-body">
                            <form action="/users/{{ $user->id }}" class="row g-3" method="post"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <div class="col-md-6">
                                    <label for="name">Nama Lengkap</label>
                                    <div class="input-group">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', Auth::user()->name) }}">
                                    </div>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <p class="text-danger"> {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="username">Username</label>
                                    <div class="input-group">
                                        <input type="text" name="username"
                                            class="form-control @error('username') is-invalid @enderror"
                                            value="{{ old('username', Auth::user()->username) }}">
                                    </div>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            <p class="text-danger"> {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', Auth::user()->email) }}">
                                    </div>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            <p class="text-danger"> {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select class="form-control select2bs4" name="id_jab" style="width: 100%;">
                                            @foreach ($jabatan as $j)
                                                @if (old('id_jab', Auth::user()->id_jab) == $j->id)
                                                    <option value="{{ $j->id }}" selected>
                                                        {{ $j->jabatan }}
                                                    </option>
                                                @else
                                                    <option value="{{ $j->id }}">{{ $j->jabatan }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Unit Kerja</label>
                                        <select class="form-select select2bs4" name="id_unit" style="width: 100%;" disabled>
                                            @foreach ($unit as $un)
                                                @if (old('id_unit', Auth::user()->id_unit) == $un->id)
                                                    <option value="{{ $un->id }}" selected>
                                                        {{ $un->unit }}
                                                    </option>
                                                @else
                                                    <option value="{{ $un->id }}">{{ $un->unit }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sub Bagian</label>
                                        <select class="form-select select2bs4" name="id_sub" style="width: 100%;" disabled>
                                            @foreach ($subdit as $s)
                                                @if (old('id_sub', Auth::user()->id_sub) == $s->id)
                                                    <option value="{{ $s->id }}" selected>
                                                        {{ $s->subdit }}
                                                    </option>
                                                @else
                                                    <option value="{{ $s->id }}">{{ $s->subdit }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Upload Foto</label>
                                        <input type="hidden" name="oldFoto" value="{{ Auth::user()->foto }}">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="foto"
                                                    name="foto" onchange="previewImage()"
                                                    value="{{ old('foto', Auth::user()->foto) }}">
                                                <label class="custom-file-label"
                                                    id="foto">{{ Auth::user()->foto }}</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-5">
                                    @if ($user->foto)
                                        <img src="{{ asset('storage/user-image/' . $user->foto) }}"
                                            class="img-preview img-fluid mb-3 col-md-5">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-md-5" value="{{ old('foto') }}">
                                    @endif

                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary float-right">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
