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
                        <li class="breadcrumb-item"><a href="/profil/{{ auth()->user()->id }}">Profil</a></li>
                        <li class="breadcrumb-item active">Ubah Password</li>

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
                <div class="col-md-8">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Ubah Password</h3>
                        </div>
                        <div class="card-body">
                            <form action="/profil/ubah-password/{{ $user->id }}" class="row g-3 form-horizontal"
                                method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label
                                            class="col-sm-3
                                                col-form-label"
                                            for="current_password">Current
                                            Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="current_password" class="form-control"
                                                type="current_password" id="current_password">
                                            @error('current_password')
                                                <p class="text-danger"> {{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label
                                            class="col-sm-3
                                                col-form-label"
                                            for="password">New
                                            Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="password" class="form-control" type="password"
                                                id="password">
                                            @error('password')
                                                <p class="text-danger"> {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label
                                            class="col-sm-3
                                                col-form-label"
                                            for="password_confirmation">Confirm
                                            Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                type="password_confirmation" id="password_confirmation">
                                            @error('password_confirmation')
                                                <p class="text-danger"> {{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <input type="hidden" name="id" value="{{ $user->id }}">

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary float-right">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
@endsection
