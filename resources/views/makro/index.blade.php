@extends('layouts.app')

@section('title','Standar Operasional Prosedur - Makro')

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
              <h3 class="card-title">SOP MAKRO</h3>
            </div>
            <!-- /.card-header -->
 
            <div class="card-body">
              @foreach($judul as $item)
              <p class="text-muted">
                <a href="{{ route('makro.index', ['read' => $item->id]) }}" @class([ 'flex gap-x-2 text-sm font-medium' , 'text-blue-600'=> $item->isReadByUser(),
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
          @if (empty($file))
          <div class="card">
          
            <div class="card-header p-2">
              <ul class="nav nav-pills float-right">
                <li class="nav-item"><a class="btn btn-info" href="{{ route('makro.index', ['read' => 1]) }}" aria-selected="true"> <strong>Mulai Materi </strong></a></li>
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
          @else
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills float-right">
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <!-- Post -->
                  <div class="post">

                    <!-- /.user-block -->
                    <div class="row mb-3">
                      <iframe src=" {{ $file }}" width="1000px" height="800px"></iframe>
                    </div>
                    <!-- /.row -->
                    <a class="btn btn-info" href="{{ $file }}" target="_blank"> <strong>Lihat Lebih Jelas</strong></a>
                    @if($id < 20) 
                    <a class="btn btn-primary" href="{{ route('makro.index', ['read' => $id+1]) }}" aria-selected="true"> <strong>Selanjutnya</strong></a>
                      @elseif ( $id > 19)
                      <a class="btn btn-success" href="{{ route('makro.champ') }}" aria-selected="true"> <strong>Selesai Materi </strong></a>
                      @endif
                  </div>
                  <!-- /.post -->
                </div>

                <!-- /.tab-pane -->


              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->

          </div>
          @endif
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