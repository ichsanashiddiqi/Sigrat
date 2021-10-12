@extends('layouts.master')
@section('title', 'List Laporan')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Pelaporan Gratifikasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home">Home</a></li>
                            <li class="breadcrumb-item active">Status</li>
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
                        {{-- <div class="modal fade" id="modal-danger">
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
                        </div> --}}
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    {{-- <li class="nav-item"><a class="nav-link active" href="#list" data-toggle="tab">List
                                            Pelaporan</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#create" data-toggle="tab">Tambah
                                            data</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                    </li> --}}
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="list">
                                        {{-- <h1>tes</h1> --}}
                                        <form class="form-horizontal" action="{{ route('laporanPegawai.store') }}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Jenis
                                                    Gratifikasi</label>
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <input type="hidden" name="id" value="{{$id}}">
                                                                <input class="form-check-input" type="radio" value="Kedinasan"
                                                                       id="kedinasan" name="jenis">
                                                                <label class="form-check-label" for="kedinasan">
                                                                    Gratifikasi Kedinasan
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" value="Umum"
                                                                       id="umum" name="jenis">
                                                                <label class="form-check-label" for="umum">
                                                                    Gratifikasi Umum
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            {{-- @foreach($data as $item)
                                                                <input type="hidden" class="form-control" name="id"
                                                                       value="{{$item->id}}" required>
                                                            @endforeach --}}
                                                        </div>                                                       
                                                </div>
                                                <div id="show_Kedinasan" class="form_gratifikasi" style="display:none">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Bentuk Gratifikasi</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="bentuk" id="inbox">
                                                                        <option value="Honor Narasumber">Honor Narasumber</option>
                                                                        <option value="Honor Kegiatan/Tenaga Ahli">Honor Kegiatan/Tenaga Ahli</option>
                                                                        <option value="Biaya Perjalanan Dinas">Biaya Perjalanan Dinas</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="show_Umum" class="form_gratifikasi" style="display:none">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Bentuk Gratifikasi</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="bentuk" id="inbox">
                                                                        <option value="Honor Narasumber">Uang</option>
                                                                        <option value="Honor Kegiatan/Tenaga Ahli">Makanan</option>
                                                                        <option value="Biaya Perjalanan Dinas">Barang</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Gol. /ruang</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="golongan"
                                                           placeholder="Gol. /ruang" value="">
                                                </div>
                                            </div>    
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Nilai
                                                    Equivalent</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Rp.</span>
                                                        </div>
                                                        <input type="number" min="1" step="any" class="form-control"
                                                               name="nilai" placeholder="100000" value="" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Tanggal
                                                    Penerimaan gratifikasi</label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" name="tanggal"
                                                           placeholder="Lokasi Pemberian" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Lokasi
                                                    Pemberian</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="lokasi"
                                                           placeholder="Lokasi Pemberian" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Pemberi</label>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="lama"
                                                               id="lama" name="pilih_pemberi">
                                                        <label class="form-check-label" for="lama">
                                                            Pemberi yang tersedia
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="baru"
                                                               id="baru" name="pilih_pemberi">
                                                        <label class="form-check-label" for="baru">
                                                            Tambah pemberi baru
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="show_lama" class="form_pemberi" style="display:none">
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">List
                                                        Pemberi</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="pemberi_lama" id="inbox">
                                                            <option value="" selected></option>
                                                            @foreach ($pemberi as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->nama.' - '.$item->alamat.' - '.$item->telepon }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="show_baru" class="form_pemberi" style="display:none">
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Nama
                                                        Pemberi</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="nama"
                                                               placeholder="Nama Pemberi" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Alamat
                                                        Pemberi</label>
                                                    <div class="col-sm-10">
                                                            <textarea name="alamat" id="" cols="30" rows="5"
                                                                      class="form-control"
                                                                      placeholder="Alamat Pemberi"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Nomor
                                                        Telepon</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="notelp"
                                                               placeholder="nomor telepon" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Hubungan dengan
                                                    pemberi</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="hubungan"
                                                           placeholder="Hubungan dengan pemberi gratifikasi" value=""
                                                           required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Waktu Pelaksanaan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="waktu"
                                                           placeholder="Hari / Jam" value=""
                                                           >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="foto" class="col-sm-2 col-form-label">Foto Bukti</label>
                                                <div class="input-group col-sm-10">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" value=""
                                                            name="foto" placeholder="Foto">
                                                        <label class="custom-file-label" for="exampleInputFile">Foto</label>
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
                                    <div class="tab-pane" id="create">

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
        <script type="text/javascript" charset="utf-8"
                src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js">
        </script>
        @if ($errors->any())
            <script>
                $(function () {
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
                $(function () {
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
            $(document).ready(function () {
                $('#table2').DataTable({
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": true,
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                })
            })
            document.addEventListener('DOMContentLoaded', function () {
                $('#deleteModal').on('show.bs.modal', function (event) {
                    const button = $(event.relatedTarget)
                    const value = button.data('outbox')
                    console.log(value);
                    $(this).find('form').attr('action', `{{ route('petugas.destroy', '') }}/${value}`)
                })
            })
            $(function () {
                $('#employees').select2()
                $('#inbox').select2()
                // $('#date').datepicker({
                //     format: 'L'
                // });
            })
            $('input[type="radio"]').click(function () {
                var demovalue = $(this).val();
                $("div.form_pemberi").hide();
                $("#show_" + demovalue).show();
            })
            $('input[type="radio"]').click(function () {
                var demovalue = $(this).val();
                $("div.form_gratifikasi").hide();
                $("#show_" + demovalue).show();
            });
        </script>
    @endpush
@endsection
