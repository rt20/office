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
            <li class="breadcrumb-item"><a href="/dashboard/qms">QMS</a></li>
            <li class="breadcrumb-item active">SOP</li>
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
              <!-- <strong><i class="far fa-file-alt mr-1""></i> POM-2</strong> -->
              @forelse($sop as $row)
              <p class="text-muted">
                @if($row->isRead == 1)
                <i class="fa fa-check-square mr-1""></i>
              @else($row->isRead == 0)
              <i class=" fa fa-play mr-1""></i>
                @endif

                <a href="{{ route('qms.show', $row->id) }}">
                  <span class="tag tag-danger">{{ $row->judul }}</span>
                </a>
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
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link"><strong>{{ $qms->nomor }} - {{ $qms->judul }}</strong></a></li>

              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <!-- Post -->
                  <div class="post">

                    <!-- /.user-block -->
                    <div class="row mb-3">

                      <iframe src="{{ $qms->file }}" width="1000px" height="800px"></iframe>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <a class="btn btn-info" href="{{ $qms->file }}" target="_blank"> <strong>Lihat Lebih Jelas </strong></a>
                    @if($qms->id+1 < 20) <!-- <input value="1" name="isRead" type="text"> -->
                      <a class="btn btn-primary" href="{{ route('qms.show', $qms->id+1) }}" aria-selected="true"> <strong>Selesai & Lanjut Materi </strong></a>
                      @elseif ($qms->id+1 == 23)
                      <a class="btn btn-success" href="{{ route('qms.champ') }}" aria-selected="true"> <strong>Selesai Materi </strong></a>
                      @endif
                  </div>
                  <!-- /.post -->
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                  <!-- The timeline -->
                  <div class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-danger">
                        10 Feb. 2014
                      </span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-envelope bg-primary"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 12:05</span>

                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                        <div class="timeline-body">
                          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                          weebly ning heekya handango imeem plugg dopplr jibjab, movity
                          jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                          quora plaxo ideeli hulu weebly balihoo...
                        </div>
                        <div class="timeline-footer">
                          <a href="#" class="btn btn-primary btn-sm">Read more</a>
                          <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-user bg-info"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                        </h3>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-comments bg-warning"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                        <div class="timeline-body">
                          Take me to your leader!
                          Switzerland is small and neutral!
                          We are more like Germany, ambitious and misunderstood!
                        </div>
                        <div class="timeline-footer">
                          <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-success">
                        3 Jan. 2014
                      </span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-camera bg-purple"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                        <div class="timeline-body">
                          <img src="https://placehold.it/150x100" alt="...">
                          <img src="https://placehold.it/150x100" alt="...">
                          <img src="https://placehold.it/150x100" alt="...">
                          <img src="https://placehold.it/150x100" alt="...">
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <div>
                      <i class="far fa-clock bg-gray"></i>
                    </div>
                  </div>
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