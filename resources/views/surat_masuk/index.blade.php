@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{$title}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data {{$title}}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </div>
                <!-- /.modal -->

                <div class="modal fade" id="modal-tambah">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah {{$title}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                            <form id="formTambah" action="{{ route('suratmasuk.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- Modal Body  -->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nomor_surat">Nomor Surat</label>
                                                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat" value="{{old('nomor_surat')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="asal_surat">Asal Surat</label>
                                                <input type="text" class="form-control" id="asal_surat" name="asal_surat" placeholder="Asal Surat" value="{{old('asal_surat')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="isi_ringkas">Isi Ringkas</label>
                                                <textarea name="isi_ringkas" class="form-control" id="isi_ringkas" rows="2" placeholder="Isi Ringkas Surat Masuk">{{old('isi_ringkas')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kode Klasifikasi</label>
                                                <select class="form-control select2" style="width: 100%;" name="klasifikasi_id">
                                                    <option selected="selected">-- Pilih Klasifikasi -- </option>
                                                    @foreach($data_klasifikasi as $klasifikasi)
                                                    <option value="{{$klasifikasi->id}}">{{$klasifikasi->kode}} | {{$klasifikasi->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="tanggal_surat">Tanggal Surat</label>
                                                <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" placeholder="Tanggal Surat" value="{{old('tanggal_surat')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan</label>
                                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{old('keterangan')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="file">File</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="file" accept="image/png, image/jpeg, application/pdf, application/msword">
                                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer justify-content-end">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                                    <a href="#" class="btn btn-primary btn-add-save" data-id="btnAddSave">Simpan</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">

                <table id="example1" class="table table-hover">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Isi Ringkas</th>
                            <th>File</th>
                            <th>Asal Surat</th>
                            <th>Kode</th>
                            <th>Nomor Surat</th>
                            <th>Tgl. Surat</th>
                            <th>Tgl. Diterima</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 0; ?>
                        @foreach($data_surat_masuk as $suratmasuk)
                        <?php $no++; ?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$suratmasuk->isi_surat}}</td>
                            <td>
                                <a href="dist/img/surat_masuk/{{$suratmasuk->file}}" target="_blank">{{$suratmasuk->file}}</a>
                            </td>
                            <td>{{$suratmasuk->asal_surat}}</td>
                            <td>{{$suratmasuk->klasifikasis->kode}}</td>
                            <td>{{$suratmasuk->nomor_surat}}</td>
                            <td>{{$suratmasuk->tanggal_surat}}</td>
                            <td>{{date('Y-m-d', strtotime($suratmasuk->created_at))}}</td>
                            <td>{{$suratmasuk->keterangan}}</td>
                            <td>
                                <a href="{{ route('suratmasuk.show', $suratmasuk->id) }}" class="btn btn-primary btn-sm mb-1">Disposisi</a>
                                <button type="button" class="btn btn-warning btn-sm mb-1" data-toggle="modal" data-target="#modalEdit{{$suratmasuk->id}}">
                                    Edit
                                </button>
                                @if (auth()->user()->role == 1)
                                <a href="#" class="btn btn-sm btn-danger mb-0 btn-delete mb-1" data-id="{{$suratmasuk->id}}">
                                    <form action="{{ route('suratmasuk.destroy', $suratmasuk->id) }}" method="post" id="delete{{$suratmasuk->id}}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    Hapus
                                </a>
                                @endif
                            </td>

                            <!-- Modal Edit-->
                            <div class="modal fade" id="modalEdit{{$suratmasuk->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit {{$title}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="formEdit{{$suratmasuk->id}}" action="{{ route('suratmasuk.update', $suratmasuk->id) }}" method="post">
                                            {{ method_field('PATCH') }}
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nomor_surat">Nomor Surat</label>
                                                            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat" value="{{$suratmasuk->nomor_surat}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="asal_surat">Asal Surat</label>
                                                            <input type="text" class="form-control" id="asal_surat" name="asal_surat" placeholder="Asal Surat" value="{{$suratmasuk->asal_surat}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="isi_ringkas">Isi Ringkas</label>
                                                            <textarea name="isi_ringkas" class="form-control" id="isi_ringkas" rows="2" placeholder="Isi Ringkas Surat Masuk">{{$suratmasuk->isi_surat}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Kode Klasifikasi</label>
                                                            <select class="form-control select2" style="width: 100%;" name="klasifikasi_id">
                                                                <option value="">-- Pilih Klasifikasi -- </option>
                                                                @foreach($data_klasifikasi as $klasifikasi)
                                                                <option value="{{$klasifikasi->id}}" @if($suratmasuk->klasifikasis_id == $klasifikasi->id) selected @endif>{{$klasifikasi->kode}} | {{$klasifikasi->nama}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="tanggal_surat">Tanggal Surat</label>
                                                            <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" placeholder="Tanggal Surat" value="{{$suratmasuk->tanggal_surat}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="keterangan">Keterangan</label>
                                                            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="{{$suratmasuk->keterangan}}">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer justify-content-end">
                                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                                                <a href="#" class="btn btn-primary btn-update-save" data-id="{{$suratmasuk->id}}">Simpan</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('scripts')

<!-- DataTables -->
<script src="/plugins/datatables/jquery.dataTables.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Select2 -->
<script src="/plugins/select2/js/select2.full.min.js"></script>

<script>
    $(function() {
        //Initialize Datatable
        $("#example1").DataTable();
        //Initialize Select2 Elements
        $('.select2').select2();
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>

<!-- Sweet Alert -->
<script src="/plugins/sweetalert/sweetalert.min.js"></script>
<script>
    //== Class definition
    var SweetAlert2Demo = function() {
        //== Demos
        var initDemos = function() {

            $('.btn-delete').click(function(e) {
                id = e.target.dataset.id;
                swal({
                    title: 'Apakah anda yakin ?',
                    text: "Hapus data secara permanen !",
                    type: 'warning',
                    buttons: {
                        confirm: {
                            text: 'Hapus',
                            className: 'btn btn-primary'
                        },
                        cancel: {
                            visible: true,
                            text: 'Batal',
                            className: 'btn btn-outline-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        $(`#delete${id}`).submit();
                    } else {
                        swal.close();
                    }
                });
            });

            $('.btn-add-save').click(function(e) {
                id = e.target.dataset.id;
                swal({
                    title: 'Apakah anda yakin ?',
                    text: "Simpan data !",
                    type: 'warning',
                    buttons: {
                        confirm: {
                            text: 'Simpan',
                            className: 'btn bg-gradient-primary'
                        },
                        cancel: {
                            visible: true,
                            text: 'Batal',
                            className: 'btn btn-outline-danger'
                        }
                    }
                }).then((Delete) => {
                    if (Delete) {
                        $(`#formTambah`).submit();
                    } else {
                        swal.close();
                    }
                });
            });
        };

        $('.btn-update-save').click(function(e) {
            id = e.target.dataset.id;
            swal({
                title: 'Apakah anda yakin ?',
                text: "Simpan perubahan data !",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: 'Simpan',
                        className: 'btn bg-gradient-primary'
                    },
                    cancel: {
                        visible: true,
                        text: 'Batal',
                        className: 'btn btn-outline-danger'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    $(`#formEdit${id}`).submit();
                } else {
                    swal.close();
                }
            });
        });
        return {
            //== Init
            init: function() {
                initDemos();
            },
        };
    }();
    //== Class Initialization
    jQuery(document).ready(function() {
        SweetAlert2Demo.init();
    });
</script>
@endsection