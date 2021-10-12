@extends('layouts.master')
@section('title', 'Gratifikasi')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gratifikasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home">Home</a></li>
                            <li class="breadcrumb-item active">Gratifikasi</li>
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
                                    <div class="float-right">
                                        <a class="btn btn-secondary" href="/export"> Export</a>
                                    </div>
                                    <li class="nav-item"><a class="nav-link active" href="#list" data-toggle="tab">List
                                            Laporan</a></li>
                                    {{-- <li class="nav-item"><a class="nav-link" href="#create" data-toggle="tab">Tambah
                                            data</a>
                                    </li> --}}
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
                                                    <th>NO</th>
                                                    <th>JENIS BENTUK GRATIFIKASI</th>
                                                    <th>NAMA PENERIMA GRATIFIKASI</th>
                                                    <th>NILAI EQUIVALENT</th>
                                                    <th>TANGGAL PENERIMAAN PEMBERIAN</th>
                                                    <th>LOKASI PEMBERIAN</th>
                                                    <th>PEMBERI GRATIFIKASI</th>
                                                    <th>HUBUNGAN DENGAN PEMBERI GRATFIKASI</th>
                                                    <th>BUKTI</th>
                                                    {{-- <th>Aksi</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1 @endphp
                                                @foreach ($data as $item)
                                                    @if ($item->laporan)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $item->laporan->jenis_gratifikasi }},
                                                                {{ $item->laporan->bentuk_gratifikasi }}</td>
                                                            <td>{{ $item->user->nama }}, NIP.{{ $item->user->nip }}, 
                                                                Gol. /ruang: {{ $item->laporan->golongan }}, 
                                                                Jabatan.{{ $item->user->jabatan }}</td>
                                                            <td>Rp. {{ $item->laporan->nilai_equivalent }}</td>
                                                            <td>{{ $item->laporan->tanggal_pemberian }}</td>
                                                            <td>{{ $item->laporan->tempat }}</td>
                                                            <td>{{ $item->laporan->pemberi->nama }},
                                                                {{ $item->laporan->pemberi->alamat }},
                                                                {{ $item->laporan->pemberi->telepon }}</td>

                                                            @if ($item->laporan->waktu_pelaksanaan)
                                                                <td>{{ $item->laporan->hubungan_pemberi }},
                                                                    {{ $item->laporan->waktu_pelaksanaan }}</td>
                                                            @else
                                                                <td>{{ $item->laporan->hubungan_pemberi }}</td>
                                                            @endif

                                                            @if ($item->laporan->foto)
                                                                <td>
                                                                    <div class="text-center">
                                                                        <img width="200" height="200"
                                                                            src="{{ asset('storage/laporan/images/' . $item->laporan->foto) }}"
                                                                            alt="QQ">
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td></td>
                                                            @endif
                                                        </tr>
                                                    @endif


                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- <div class="tab-pane" id="create">
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
                                    </div> --}}

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
