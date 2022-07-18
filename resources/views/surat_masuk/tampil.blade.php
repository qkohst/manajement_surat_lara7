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
                <div class="row">
                    <div class="col-8">
                        <h5>Nama File : {{$surat_masuk->file}}</h5>
                    </div>
                    <div class=col-4>
                        <a style="float: right" class="btn btn-primary btn-sm my-4 mr-sm-2" href="/dist/img/surat_masuk/{{$surat_masuk->file}}" download="{{$surat_masuk->file}}" role="button"><i class="fas fa-file-download"></i> Download</a>
                        <a style="float: right" class="btn btn-danger btn-sm my-4 mr-sm-2" href="{{ route('galeri.suratmasuk') }}" role="button"><i class="fas fa-undo"></i> Kembali</a>
                    </div>
                </div>
                <div class="text-center">
                    <img src="/dist/img/surat_masuk/{{$surat_masuk->file}}" class="rounded" width="900" alt="File Tidak Dapat Ditampilkan Silahkan Klik Download Untuk Melihat" />
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection