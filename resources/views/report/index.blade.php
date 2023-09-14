@extends('layouts.app')

@section('title','Laporan Pengguna')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Pengguna Menu QMS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Laporan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <main>
            <div class="container-fluid px-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <!-- <div class="col-sm-auto">
                        </div> -->

                    </div>
                    <div class="card-body">
                    <a class="btn btn-warning" href="{{ route('report.export') }}">Download Laporan</a>
                    </div>
                </div>
            </div>
        </main>

        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{ asset("./dist/js/datatables-simple-demo.js") }}"></script>
<!-- modal di button add data mutasi BMN -->
<script>
    jQuery(document).ready(function($) {
        $('#modalmutasi').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });
    });
</script>
<!-- modal untuk menampilkan popup tambah data mutasi -->
<div class="modal" id="modalmutasi" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Data Mutasi</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>
@endpush

@push('after-style')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="{{ asset("/dist/css/styles.css") }}" rel="stylesheet" />
@endpush