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
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $book }}</h3>

                            <p>Booking Ruangan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-alarm-clock"></i>
                        </div>
                        <a href="{{ route('books.index') }}" class="small-box-footer">Detail info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $borrowcount }}</h3>

                            <p>Pinjam Barang</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-laptop"></i>
                        </div>
                        <a href="{{ route('borrows.index') }}" class="small-box-footer">Detail info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $schedule }}</h3>

                            <p>Agenda Kegiatan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-calendar"></i>
                        </div>
                        <a href="{{ route('schedules.index') }}" class="small-box-footer">Detail info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- /.col -->
                <!-- /.row -->
            </div>
            <!-- /.col -->


            <!-- fix for small devices only -->

            <!-- /.row -->



            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <!-- <div class="col-md-8"> -->



                <!-- TABLE: LATEST BOOKING -->
                <div class="card">
                   
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                           
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