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
                    <li class="breadcrumb-item"><a href="{{ route('instansi.index') }}">Instansi</a></li>
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
                <h3 class="card-title">{{$title}}</h3>
            </div>
            <form id="formEdit{{$instansi->id}}" action="{{ route('instansi.update', $instansi->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Instansi</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$instansi->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="2" placeholder="Alamat" required>{{$instansi->alamat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="pimpinan">Nama Pimpinan</label>
                        <input type="text" class="form-control" id="pimpinan" name="pimpinan" value="{{$instansi->pimpinan}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Instansi</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$instansi->email}}">
                    </div>

                    <div class="form-group">
                        <label for="logo">Logo <small class="text-danger"><i>* Hanya jika ingin mengganti logo</i></small></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="logo" accept="image/png, image/jpeg">
                            <label class="custom-file-label" for="customFile">Pilih file</label>
                        </div>
                        <small id="logo" class="text-warning">
                            Format file yang diperbolehkan hanya *.JPG, *.PNG dan ukuran maksimal file 2 MB. Disarankan
                            gambar berbentuk kotak atau lingkaran!
                        </small>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="#" class="btn btn-primary btn-update-save" data-id="{{$instansi->id}}">Simpan</a>
                    <a href="{{ route('instansi.index') }}" class="btn btn-outline-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('scripts')
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