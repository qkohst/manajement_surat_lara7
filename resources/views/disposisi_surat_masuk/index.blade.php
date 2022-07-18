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
                    <li class="breadcrumb-item"><a href="{{ route('disposisi.index') }}">Surat Masuk</a></li>
                    <li class="breadcrumb-item active">Disposisi</li>
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
                <h3 class="card-title">{{$title}}</h3>

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


                            <form id="formTambah" action="{{ route('disposisi.store') }}" method="post">
                                @csrf
                                <!-- Modal Body  -->
                                <input type="hidden" name="surat_masuk_id" value="{{$surat_masuk->id}}">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tujuan</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="tujuan" class="form-control" value="{{old('tujuan')}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Batas Waktu</label>
                                        <div class="col-sm-4">
                                            <input type="date" name="batas_waktu" class="form-control" value="{{old('batas_waktu')}}">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Sifat Dipsosisi</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="sifat" class="form-control" value="{{old('sifat')}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Isi Diposisi</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="isi" rows="3">{{old('isi')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Catatan</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="catatan" rows="2">{{old('catatan')}}</textarea>
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
                <h5>Nomor Surat : {{$surat_masuk->nomor_surat}}</h5>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tujuan</th>
                            <th>Isi Disposisi</th>
                            <th>Sifat</th>
                            <th>Batas Waktu</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @foreach($data_disposisi as $disposisi)
                        <?php $no++; ?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$disposisi->tujuan}}</td>
                            <td>{{$disposisi->isi}}</td>
                            <td>{{$disposisi->sifat}}</td>
                            <td>{{date('d-M-Y', strtotime($disposisi->batas_waktu))}}</td>
                            <td>{{$disposisi->catatan}}</td>
                            <td>
                                <a href="{{ route('disposisi.show', $disposisi->id) }}" target="_blank" class="btn btn-primary btn-sm mb-1">Cetak</a>
                                <button type="button" class="btn btn-warning btn-sm mb-1" data-toggle="modal" data-target="#modalEdit{{$disposisi->id}}">
                                    Edit
                                </button>
                                @if (auth()->user()->role == 1)
                                <a href="#" class="btn btn-sm btn-danger mb-0 btn-delete mb-1" data-id="{{$disposisi->id}}">
                                    <form action="{{ route('disposisi.destroy', $disposisi->id) }}" method="post" id="delete{{$disposisi->id}}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    Hapus
                                </a>
                                @endif
                            </td>
                        </tr>

                        <!-- Modal Edit-->
                        <div class="modal fade" id="modalEdit{{$disposisi->id}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit {{$title}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="formEdit{{$disposisi->id}}" action="{{ route('disposisi.update', $disposisi->id) }}" method="post">
                                        {{ method_field('PATCH') }}
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tujuan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="tujuan" class="form-control" value="{{$disposisi->tujuan}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Batas Waktu</label>
                                                <div class="col-sm-4">
                                                    <input type="date" name="batas_waktu" class="form-control" value="{{$disposisi->batas_waktu}}">
                                                </div>
                                                <label class="col-sm-2 col-form-label">Sifat Dipsosisi</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="sifat" class="form-control" value="{{$disposisi->sifat}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Isi Diposisi</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="isi" rows="3">{{$disposisi->isi}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Catatan</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="catatan" rows="2">{{$disposisi->catatan}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-end">
                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                                            <a href="#" class="btn btn-primary btn-update-save" data-id="{{$disposisi->id}}">Simpan</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

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