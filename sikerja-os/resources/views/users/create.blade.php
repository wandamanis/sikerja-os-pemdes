@extends('layouts.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="/user">User</a></li>
                        <li class="breadcrumb-item active">Tambah User</li>
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
                            <h3 class="card-title">Form Isian User Baru</h3>
                        </div>
                        <div class="card-body">
                            @if (session()->has('success'))
                                <div class="alert alert-primary" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="/users" class="row g-3" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <label for="name">Nama Lengkap</label>
                                    <div class="input-group">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror">
                                    </div>
                                    @error('name')
                                        <div class="alert alert-danger">
                                            {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="username">Username</label>
                                    <div class="input-group">
                                        <input type="text" name="username"
                                            class="form-control @error('username') is-invalid @enderror">
                                    </div>
                                    @error('username')
                                        <div class="alert alert-danger">
                                            {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror">
                                    </div>
                                    @error('email')
                                        <div class="alert alert-danger">
                                            {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror">
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback">
                                            <p class="text-danger"> {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select class="form-control select2 @error('id_jab') is-invalid @enderror"
                                            name="id_jab" style="width: 100%;">
                                            @foreach ($jabatan as $j)
                                                @if (old('id_jab') == $j->id)
                                                    <option value="{{ $j->id }}" selected>{{ $j->jabatan }}
                                                    </option>
                                                @else
                                                    <option value="{{ $j->id }}">{{ $j->jabatan }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_jab')
                                        <div class="alert alert-danger">
                                            {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Unit Kerja</label>
                                        <select class="form-control select2 @error('id_unit') is-invalid @enderror"
                                            name="id_unit" style="width: 100%;">
                                            @foreach ($unit as $un)
                                                @if (old('id_unit') === $un->id)
                                                    <option value="{{ $un->id }}" selected>{{ $un->unit }}
                                                    </option>
                                                @else
                                                    <option value="{{ $un->id }}">{{ $un->unit }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_unit')
                                        <div class="alert alert-danger">
                                            {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sub Bagian</label>
                                        <select class="form-control select2 @error('id_sub') is-invalid @enderror"
                                            name="id_sub" style="width: 100%;">
                                            @foreach ($subdit as $s)
                                                @if (old('id_sub') === $s->id)
                                                    <option value="{{ $s->id }}" selected>{{ $s->subdit }}
                                                    </option>
                                                @else
                                                    <option value="{{ $s->id }}">{{ $s->subdit }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_sub')
                                        <div class="alert alert-danger">
                                            {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Level User</label>
                                        <select class="form-control select2 @error('id_level') is-invalid @enderror"
                                            name="id_level" style="width: 100%;">
                                            @foreach ($level as $l)
                                                @if (old('id_level') === $l->id)
                                                    <option value="{{ $l->id }}" selected>{{ $l->level }}
                                                    </option>
                                                @else
                                                    <option value="{{ $l->id }}">{{ $l->level }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_sub')
                                        <div class="alert alert-danger">
                                            {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Upload Foto</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('foto') is-invalid @enderror"
                                                    id="foto" name="foto" onchange="previewImage()">
                                                <label class="custom-file-label" id="foto">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('foto')
                                        <div class="alert alert-danger">
                                            {{ $message }}</p>
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-5">
                                    <img class="img-preview img-fluid mb-3 col-md-5">
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function previewImage() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
