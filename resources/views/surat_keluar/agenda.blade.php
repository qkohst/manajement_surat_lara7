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
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-tambah">
                        <i class="fas fa-file-excel"></i> Download Excel
                    </button>
                    <a href="{{ route('agendakeluar.print') }}" class="btn btn-primary btn-sm" target="_blank">
                        <i class="fas fa-print"></i> Cetak
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">

                <table id="example1" class="table table-hover">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Isi Ringkas</th>
                            <th>Tujuan Surat</th>
                            <th>Kode</th>
                            <th>Nomor Surat</th>
                            <th>Tgl. Surat</th>
                            <th>Tgl. Diterima</th>
                            <th>Pengelola</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 0; ?>
                        @foreach($data_surat_keluar as $suratkeluar)
                        <?php $no++; ?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$suratkeluar->isi_surat}}</td>
                            <td>{{$suratkeluar->tujuan_surat}}</td>
                            <td>{{$suratkeluar->klasifikasis->kode}}</td>
                            <td>{{$suratkeluar->nomor_surat}}</td>
                            <td>{{$suratkeluar->tanggal_surat}}</td>
                            <td>{{date('Y-m-d', strtotime($suratkeluar->created_at))}}</td>
                            <td>{{$suratkeluar->users->name}}</td>
                            <td>{{$suratkeluar->keterangan}}</td>

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
        //Initialize Datatable
        $("#example1").DataTable();
    });
</script>
@endsection