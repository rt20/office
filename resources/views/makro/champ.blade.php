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

            @foreach($judul as $item)
              <p class="text-muted">
                <a href="{{ route('qms.index', ['read' => $item->id]) }}" @class([ 'flex gap-x-2 text-sm font-medium' , 'text-blue-600'=> $item->isReadByUser(),
                  'text-gray-400' => !$item->isReadByUser()
                  ])
                  >
                  <div>
                    @if ($item->isReadByUser())
                    <i class="fa fa-check-square mr-1"></i>
                    @else
                    <i class="fa fa-play mr-1"></i>
                    @endif
                    <span class="tag tag-danger">{{ $item->judul }}</span>
                  </div>

                </a>
              </p>

              @endforeach

            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">

              <ul class="nav nav-pills float-none ">


                <li><a class="btn btn-success" href="#" aria-selected="true"> <strong>Selamat telah menyelesaikan materi SOP</strong></a></li>

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
                        <img src="{{ asset('/dist/img/champ.png') }}" class="w-100">
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