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
                <h3 class="card-title">{{$title}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div>
                    <div class="filter-container p-0 row">
                        <?php $no = 0; ?>
                        @foreach($data_surat_masuk as $suratmasuk)
                        <?php $no++; ?>
                        <div class="col-lg-2 col-6">
                            <!-- small box -->
                            <div class="small-box">
                                <div class="inner">
                                    <a href="{{ route('galeri.suratmasuk.tampil', $suratmasuk->id) }}" target="_blank" data-toggle="lightbox" data-title="Perbesar Gambar">
                                        <center>
                                            <img src="/dist/img/surat_masuk/{{$suratmasuk->file}}" width="100" height="150" alt="File .doc, .docx, atau .pdf tidak dapat ditampilkan, Silahkan klik Lihat Detail File">
                                        </center>
                                    </a>
                                </div>
                                <a href="{{ route('galeri.suratmasuk.tampil', $suratmasuk->id) }}" target="_blank" class="small-box-footer bg-success">Lihat Detail File <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <small class="text-danger">
                    <b>Catatan : </b>File .doc, .docx, atau .pdf tidak dapat ditampilkan disini silahkan klik <b>Lihat
                        Detail File</b> !!!
                </small>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection