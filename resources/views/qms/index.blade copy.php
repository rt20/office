@extends('layouts.app')

@section('title','Standar Operasional Prosedur')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sistem Manajemen Mutu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">QMS</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <!-- Standar operasional prosedur -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Standar Operasional Prosedur</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">

              <!-- <p class="text-muted">
            <i class="fa fa-check-square mr-1 fa-1.5x"></i>
                <span class="tag tag-danger">data 1</span>
              </p>
              <hr>
              <p class="text-muted">
              <i class="fa fa-play fa-1.5x mr-1"></i>
                <span class="tag tag-danger">data 2</span>
              </p>
              <hr> -->
              @forelse($qms as $row)
              <p class="text-muted">
                @foreach($dibaca as $baca)
                @if($baca->isRead == 1)
                <i class="fa fa-check-square mr-1 fa-1.5x"></i>
                @elseif($baca->isRead == 0)
                <i class="fa fa-play fa-1.5x mr-1"></i>
                @endif
                @endforeach
                <a href="{{ route('qms.show', $row->id) }}">
                  <span class="tag tag-danger">{{ $row->judul }}</span>
              </p>
              <hr>
              @empty
              <p class="text-muted">
                <span class="tag tag-danger">Data tidak ditemukan</span>
              </p>
              <hr>
              @endforelse

            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills float-right">


                <li class="nav-item"><a class="btn btn-info" href="{{ route('qms.show', 1) }}" aria-selected="true"> <strong>Mulai Materi </strong></a></li>

              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <!-- Post -->
                  <div class="post">

                    <!-- /.user-block -->
                    <div class="row mb-3">
                      <div class="d-flex align-items-center w-100">
                        <img src="{{ asset('/dist/img/sop.png') }}" class="w-100">
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->




                  </div>
                  <!-- /.post -->
                </div>

                <!-- /.tab-pane -->


              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->

          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->


  </section>
  <!-- /.content -->
</div>
@endsection