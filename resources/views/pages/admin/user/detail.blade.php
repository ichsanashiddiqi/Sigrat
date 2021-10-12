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
                            <li class="breadcrumb-item active">User Detail</li>
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
                            <div class="card-body">
                                <div class="tab-content">
                                    
                                        <form class="form-horizontal" action="#" method="#"
                                            >
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="nama" id="nama"
                                                        placeholder="Nama" value="{{ $user->nama }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">NIP</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="nip" id="nip"
                                                        placeholder="NIP" value="{{ $user->nip }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Email" value="{{ $user->email }}"disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="jabatan" name="jabatan"
                                                        placeholder="Jabatan" value="{{ $user->jabatan }}"disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jabatan" class="col-sm-2 col-form-label">Role</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="role" name="role"
                                                        placeholder="Role" value="{{ $user->role }}"disabled>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <label for="jabatan" class="col-sm-2 col-form-label">Tanggal Dibuat</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="role" name="created_at"
                                                        placeholder="Tanggal Dibuat" value="{{ $user->created_at }}"disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jabatan" class="col-sm-2 col-form-label">Tanggal Diupdate</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="role" name="updated_at"
                                                        placeholder="Tanggal Diupdate" value="{{ $user->updated_at }}"disabled>
                                                </div>
                                            </div> --}}
                                        </form>
                                    
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <div class="float-right">
                            <a class="btn btn-secondary" href="{{ route('user.index') }}"> Back</a>
                        </div>
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
