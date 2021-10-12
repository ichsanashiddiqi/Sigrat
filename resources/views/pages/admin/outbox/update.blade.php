@extends('layouts.master')
@section('title', 'Update Surat Masuk')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Surat Masuk</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home">Home</a></li>
                            <li class="breadcrumb-item active">Surat Tugas</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#list" data-toggle="tab">Update
                                            Surat Masuk</a></li>
                                    {{-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                    </li> --}}
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="list">
                                        <form class="form-horizontal" action="{{ route('outbox.update', $data->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Surat Tugas</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="surat_tugas"
                                                        placeholder="Isi surat Tugas" value="{{ $data->nama_surat }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Surat Tugas</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="no_surat_tugas"
                                                        placeholder="Isi surat Tugas" value="{{ $data->nomor_surat }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="avatar" class="col-sm-2 col-form-label">file</label>
                                                <!-- <label for="customFile">Custom File</label> -->

                                                <div class="input-group col-sm-10">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" value=""
                                                            name="file_outbox" placeholder="file surat masuk">
                                                        <label class="custom-file-label" for="exampleInputFile">file surat
                                                            tugas</label>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Nama Pegawai</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="pegawai" id="employees">
                                                        @foreach ($user as $user)
                                                            <option value="{{ $user->id }}" {{$data->user_id === $user->id ? 'selected' : ''}}>
                                                                {{ $user->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> --}}
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Surat Masuk</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="surat_masuk" id="inbox">
                                                        @foreach ($inbox as $inbox)
                                                            <option value="{{ $inbox->id }}" {{$data->surat_masuk_id === $inbox->id ? 'selected' : ''}}>
                                                                {{ $inbox->nama_surat }}
                                                            </option>
                                                        @endforeach
                                                        <option value="">Kosongkan Surat Masuk</option>
                                                    </select>
                                                </div>
                                            </div>
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
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete inbox</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    {{ method_field('DELETE') }}
                    @csrf
                    <div class="modal-body">
                        Delete Surat Masuk?
                    </div>
                    <input type="hidden" name="id_pemasukan">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('js')
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
                integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
        <script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
        </script>
        @if ($errors->any())
            <script>
                $(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000
                    });
                    Toast.fire({
                        icon: 'error',
                        title: '{!! implode('<br>', $errors->all()) !!}'
                    })
                })
            </script>
        @elseif ($message = Session::get('success'))
            <script>
                $(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000
                    });
                    Toast.fire({
                        icon: 'success',
                        title: '{{ $message }}'
                    })
                })
            </script>
        @endif
        <script>
            $(document).ready(function() {
                $('#table2').DataTable({
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": true,
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                })
            })
            document.addEventListener('DOMContentLoaded', function() {
                $('#deleteModal').on('show.bs.modal', function(event) {
                    const button = $(event.relatedTarget)
                    const value = button.data('inbox')

                    $(this).find('form').attr('action', `{{ route('inbox.destroy', '') }}/${value}`)
                })
            })
        </script>
    @endpush
@endsection
