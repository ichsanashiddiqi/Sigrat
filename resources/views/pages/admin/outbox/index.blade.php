@extends('layouts.master')
@section('title', 'Surat Tugas')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Surat Tugas</h1>
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
                                            Surat Tugas</a></li>
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
                                        <table class="table table-bordered table-striped text-center" id="table2">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tugas</th>
                                                    <th>Nomor Surat Tugas</th>
                                                    <th>Jumlah Petugas</th>
                                                    <th>Surat Masuk</th>
                                                    <th>Status</th>
                                                    {{-- <th>Detail</th> --}}
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1 @endphp
                                                @foreach ($data as $item)

                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $item->nama_surat }}</td>
                                                        <td>{{ $item->nomor_surat }}</td>
                                                        {{-- <td>{{ $item->file_surat }}</td> --}}
                                                        <td>
                                                            {{ $item->petugas_count }}
                                                        </td>
                                                        <td>
                                                            @if ($item->inbox)
                                                                {{ $item->inbox->nama_surat }}
                                                            @else
                                                                tidak memiliki surat masuk
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @switch(true)
                                                                @case($item->laporan_count === 0 && $item->petugas_count > 0)
                                                                    <span class="badge rounded-pill bg-danger"><i
                                                                            class="fas fa-times"></i> Belum mengisi
                                                                        laporan</span>
                                                                @break
                                                                @case($item->laporan_count === 0 && $item->petugas_count == 0)
                                                                    <span class="badge rounded-pill bg-danger"><i
                                                                            class="fas fa-times"></i> Belum mengisi
                                                                        laporan</span>
                                                                @break

                                                                @case($item->laporan_count < $item->petugas_count)
                                                                    <span class="badge rounded-pill bg-warning"><i
                                                                            class="fas fa-exclamation-circle"></i> Baru diisi sebagian</span>
                                                                @break

                                                                @case($item->laporan_count === $item->petugas_count)
                                                                    <span class="badge rounded-pill bg-success"><i
                                                                            class="fas fa-check"></i> Sudah mengisi
                                                                        laporan</span>
                                                                @break
                                                            @endswitch
                                                        </td>
                                                        <td>
                                                            <a href=" {{ asset('storage/outbox/' . $item->file_surat) }} "
                                                                class="btn btn-primary"><i
                                                                    class='fas fa-info-circle'></i></a>
                                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                                data-target="#deleteModal"
                                                                data-outbox="{{ $item->id }}"><i
                                                                    class='fas fa-trash'></i></button>
                                                            <a href="{{ route('outbox.edit', $item->id) }}"
                                                                class="btn btn-warning"><i class='fas fa-edit'></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="create">
                                        <form class="form-horizontal" action="{{ route('outbox.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Surat Tugas</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="surat_tugas"
                                                        placeholder="Isi surat Tugas" value="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Nomor Surat Tugas</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="no_surat_tugas"
                                                        placeholder="Isi Nomor surat Tugas" value="">
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
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Nama Pegawai</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="pegawai" id="employees">
                                                        @foreach ($user as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Surat Masuk</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="surat_masuk" id="inbox">
                                                        @foreach ($inbox as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->nama_surat }}
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete Surat Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    {{ method_field('DELETE') }}
                    @csrf
                    <div class="modal-body">
                        Delete Surat Tugas?
                    </div>
                    <input type="hidden" name="id_tugas">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Delete</button>
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
                    const value = button.data('outbox')
                    console.log(value);
                    $(this).find('form').attr('action', `{{ route('outbox.destroy', '') }}/${value}`)
                })
            })
            $(function() {
                $('#employees').select2()
                $('#inbox').select2()
            })
        </script>
    @endpush
@endsection
