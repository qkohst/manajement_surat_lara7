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
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah {{$title}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                            <form id="formTambah" action="{{ route('klasifikasi.store') }}" method="post">
                                @csrf
                                <!-- Modal Body  -->
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="kode">Kode</label>
                                        <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode" value="{{old('kode')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="{{old('nama')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea name="keterangan" class="form-control bg-light" id="keterangan" rows="2" placeholder="Keterangan">{{old('keterangan')}}</textarea>
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
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 0; ?>
                        @foreach($data_klasifikasi as $klasifikasi)
                        <?php $no++; ?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$klasifikasi->kode}}</td>
                            <td>{{$klasifikasi->nama}}</td>
                            <td>{{$klasifikasi->keterangan}}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEdit{{$klasifikasi->id}}">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </button>

                                @if (auth()->user()->role == 1)
                                <a href="#" class="btn btn-sm btn-danger mb-0 btn-delete" data-id="{{$klasifikasi->id}}">
                                    <form action="{{ route('klasifikasi.destroy', $klasifikasi->id) }}" method="post" id="delete{{$klasifikasi->id}}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                                @endif

                            </td>

                            <!-- Modal Edit-->
                            <div class="modal fade" id="modalEdit{{$klasifikasi->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit {{$title}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="formEdit{{$klasifikasi->id}}" action="{{ route('klasifikasi.update', $klasifikasi->id) }}" method="post">
                                            {{ method_field('PATCH') }}
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="kode">Kode</label>
                                                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode" value="{{$klasifikasi->kode}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="{{$klasifikasi->nama}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="keterangan">Keterangan</label>
                                                    <textarea name="keterangan" class="form-control bg-light" id="keterangan" rows="2" placeholder="Keterangan">{{$klasifikasi->keterangan}}</textarea>
                                                </div>

                                            </div>
                                            <div class="modal-footer justify-content-end">
                                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                                                <a href="#" class="btn btn-primary btn-update-save" data-id="{{$klasifikasi->id}}">Simpan</a>
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

<script>
    $(function() {
        $("#example1").DataTable();
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