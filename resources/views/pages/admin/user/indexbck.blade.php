@extends('layouts.master')
@section('title', 'Surat Masuk')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kelola User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home">Home</a></li>
                            <li class="breadcrumb-item active">Kelola User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    {{-- <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('storage/images/' . Auth::user()->avatar) }}"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                                <p class="text-muted text-center">{{ $user->jabatan }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Role</b> <a class="float-right">{{ $user->role }}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div> --}}
                    <div class="col-md-12">
                        <div class="modal fade" id="modal-danger">
                            <div class="modal-dialog">
                                <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Data</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Delete Data?&hellip;</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-light"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-outline-light" id="deleteInbox">Delete</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#list" data-toggle="tab">List
                                            User</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#create" data-toggle="tab">Tambah
                                            data</a>
                                    </li>
                                    {{-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                    </li> --}}
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="list">
                                        <table class="table table-bordered table-striped" id="table2">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    
                                                    {{-- <th>Detail</th> --}}
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1 @endphp
                                                @foreach ($data as $item)

                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $item->surat_masuk }}</td>
                                                        <td>{{ $item->file_masuk }}</td>
                                                        <td>
                                                            <a href=" {{ asset('storage/inbox/' . $item->file_masuk) }} "
                                                                class="btn btn-primary"><i
                                                                    class='fas fa-info-circle'></i></a>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                                data-target="#deleteModal"
                                                                data-inbox="{{ $item->id_masuk }}"><i
                                                                    class='fas fa-trash'></i></button>
                                                            <a href="{{route('inbox.edit',$item->id_masuk)}}" class="btn btn-warning"><i
                                                                class='fas fa-edit'></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="create">
                                        <form class="form-horizontal" action="{{ route('inbox.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Surat Masuk</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="inbox"
                                                        placeholder="Isi surat Masuk" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="avatar" class="col-sm-2 col-form-label">file</label>
                                                <!-- <label for="customFile">Custom File</label> -->

                                                <div class="input-group col-sm-10">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" value=""
                                                            name="file_inbox" placeholder="file surat masuk">
                                                        <label class="custom-file-label" for="exampleInputFile">file surat
                                                            masuk</label>
                                                    </div>
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
        @if ($message = Session::get('fail'))
            <script>
                $(function() {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        icon: 'error',
                        title: '{{ $message }}'
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
                        timer: 3000
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
