@extends('layouts.master')
@section('title', 'Profile')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img width="200" height="200"
                                        src="{{ asset('storage/images/' . $user->avatar) }}"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $user->nama }}</h3>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#settings"
                                            data-toggle="tab">Settings</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="settings">
                                        <form class="form-horizontal" action="{{ route('user.update',$user->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="nama" id="nama"
                                                        placeholder="Nama" value="{{ $user->nama }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">NIP</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="nip" id="nip"
                                                        placeholder="NIP" value="{{ $user->nip }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Email" value="{{ $user->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" placeholder="Kosongkan jika tidak ingin mengubah password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="jabatan" name="jabatan"
                                                        placeholder="Jabatan" value="{{ $user->jabatan }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="role" class="col-sm-2 col-form-label">Role</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2bs4" name = "role" style="width: 100%;">
                                                        <option value="Admin">Admin</option>
                                                        <option value="Pegawai">Pegawai</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="avatar" class="col-sm-2 col-form-label">Foto</label>
                                                <!-- <label for="customFile">Custom File</label> -->

                                                <div class="input-group col-sm-10">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="avatar"
                                                            value=" {{ $user->avatar }}" name="avatar">
                                                        <label class="custom-file-label"
                                                            for="exampleInputFile">{{ $user->avatar }}</label>
                                                    </div>
                                                </div>

                                                {{-- <div class="col-sm-10">
                                                    <input type="file" class="custom-file-input" id="avatar"
                                                        placeholder="">
                                                </div> --}}
                                            </div>
                                            {{-- <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"> I agree to the <a href="#">terms and
                                                                conditions</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <div class="float-right">
                            <a class="btn btn-secondary" href="{{ route('user.index') }}"> Back</a>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    @push('js')
        {{-- <script src=" {{ asset('js/app.js') }}"></script> --}}
    @endpush
@endsection
