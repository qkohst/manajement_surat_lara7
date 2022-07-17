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
                <h3 class="card-title">Profil {{$title}}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <h3 class="font-weight-bold">{{ $instansi->nama }}</h3>
                        <ul class="ml-4 mb-0 fa-ul">
                            <li class="my-3"><span class="fa-li"><i class="fas fa-lg fa-user-tie"></i></span>
                                <h4>Pimpinan
                                    &nbsp;: {{ $instansi->pimpinan }}</h4>
                            </li>
                            <li class="my-3"><span class="fa-li"><i class="fas fa-lg fa-map-marker-alt"></i></span>
                                <h4>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $instansi->alamat }}</h4>
                            </li>
                            <li><span class="fa-li"><i class="fas fa-lg fa-at"></i></span>
                                <h4>Email
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $instansi->email }}</h4>
                            </li>
                        </ul>
                    </div>
                    <a href="/dist/img/logo/{{$instansi->logo}}" data-toggle="lightbox" data-title="Lihat Logo Instansi">
                        <center>
                            <img id="logo" src="/dist/img/logo/{{$instansi->logo}}" alt="Logo Instansi" class="rounded" width="200"><br>
                        </center>
                    </a>
                </div>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-primary btn-md" href="{{ route('instansi.edit', $instansi->id) }}" role="button"><i class="fas fa-edit"></i> Edit Data Instansi</a>
            </div>
        </div>
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection