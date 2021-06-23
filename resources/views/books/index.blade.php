@extends('layouts.app')

@section('title','Booking Ruangan')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Booking Ruangan Daring/Luring</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Booking Ruangan</li>
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
                        <a href="{{ route('books.create') }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded float-right">
                            + Booking Ruangan
                        </a>
                    </div>
                </div>
            </div>
            <!-- AKHIR DATE RANGE PICKER -->

            <div class="card-body">

                <div class="card-body table-responsive" style="overflow-x:auto;">
                    <table id="booking" class="table table-striped table-bordered table-sm" style="width:100%">
                        <thead class="thead-light">
                            <tr>

                                <th>Tanggal Mulai</th>
                                <th>Waktu Mulai</th>
                                <th>Agenda</th>
                                <th>Tanggal Selesai</th>
                                <th>Waktu Selesai</th>
                                <th>Ruangan</th>
                                <th>Link</th>
                                <th>PIC</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- push external js -->
<!-- MULAI MODAL KONFIRMASI DELETE-->

<div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">PERHATIAN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><b>Data agenda kegiatan akan dihapus</b></p>
                    <p>Apakah anda yakin?</p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- AKHIR MODAL -->
@endsection
