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
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{$title}}</a></li>
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
    <div class="card p-4">
      <div class="row">
        <div class="col">
          <center>
            <h3 class="font-weight-bold">SELAMAT DATANG DI BERANDA APLIKASI MANAJEMEN SURAT</h3>
            <hr />
          </center>
          <br>
        </div>
      </div>

      <div class="row">
        <div class="card-body">
          <!-- Small boxes (Stat box) -->
          <div class="filter-container p-0 row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-light">
                <div class="inner">
                  <h3>0</h3>
                  <p>Surat Masuk</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-envelope-open-text"></i>
                </div>
                <a href="#" class="small-box-footer bg-orange">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-light">
                <div class="inner">
                  <h3>0</h3>
                  <p>Surat Keluar</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-envelope"></i>
                </div>
                <a href="#" class="small-box-footer bg-orange">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-light">
                <div class="inner">
                  <h3>0</h3>
                  <p>Klasifikasi</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-layer-group"></i>
                </div>
                <a href="#" class="small-box-footer bg-orange">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            @if (auth()->user()->role == 1)
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-light">
                <div class="inner">
                  <h3>{{$count_user}}</h3>
                  <p>Pengguna</p>
                </div>
                <div class="icon">
                  <i class="nav-icon fas fa-user"></i>
                </div>
                <a href="{{ route('user.index') }}" class="small-box-footer bg-orange">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            @endif
            <!-- ./col -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection