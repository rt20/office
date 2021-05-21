@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pegawai WFO</span>
                            <span class="info-box-number">
                                30
                                <small>%</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-pallet"></i></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Barang Dipinjam</span>
                            <span class="info-box-number">10</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-car"></i></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pemakaian Mobil</span>
                            <span class="info-box-number">1</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pegawai</span>
                            <span class="info-box-number">66</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->



            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <!-- <div class="col-md-8"> -->



                    <!-- TABLE: LATEST BOOKING -->
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Peminjaman Terakhir</h3>

                           
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Peminjam</th>
                                            <th>Nama Barang</th>
                                            <th>Merk</th>
                                            <th>Mulai</th>
                                            <th>Selesai</th>
                                            <th>Agenda</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($borrow as $item)
                                        <tr>
                                            <td >
                                                {{ ($borrow->currentPage()-1) * $borrow->perPage()+$loop->index+1 }}
                                            </td>
                                            <td ">{{ $item->borrower }}</td>
                                            <td >{{ $item->item }}</td>
                                            <td >{{ $item->merk }}</td>
                                            <td >{{ date('d F y', strtotime($item->start)) }}
                                            </td>
                                            <td >{{ date('d F y', strtotime($item->end)) }}</td>
                                            <td >{{ $item->agenda }}</td>
                                            <td><span class="badge badge-danger">Dipinjam</span></td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td>
                                                Data Tidak Ditemukan
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->

                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                <!-- </div> -->
                <!-- /.col -->

               
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection