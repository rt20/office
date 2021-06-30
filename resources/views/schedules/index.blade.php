@extends('layouts.app')

@section('title','Jadwal Kegiatan')

@section('content')   

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @include ('flash::message')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jadwal Kegiatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Jadwal</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="card">
            <div class="card-body">
                <div class="row input-daterange">
                    <div class="col-sm-2">
                        <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date"
                            readonly />
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date"
                            readonly />
                    </div>
                    <div class="col-sm-4">
                        <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                        <button type="button" name="refresh" id="refresh" class="btn btn-info">Refresh</button>
                        <!-- <button type="button" name="today" id="today" class="btn btn-success">Hari ini</button> -->
                    </div>
                    <div class="col-sm-auto">
                        <a href="{{ route('schedules.create') }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded float-right">
                            + Agenda
                        </a>
                    </div>
                </div>
            </div>
            <!-- AKHIR DATE RANGE PICKER -->

            <div class="card-body">

                <div class="card-body table-responsive" style="overflow-x:auto;">
                <table id="schedule" class="table-auto table-striped table-bordered w-full">
                    <thead>
                    <tr>
                        <th>Hari, Tanggal</th>
                        <th>Waktu</th>
                        <th>Agenda</th>
                        <th>Lokasi</th>
                        <th>Penyelenggara</th>
                        <th>Peserta</th>
                        <th>Lampiran</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    



      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection