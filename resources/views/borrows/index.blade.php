@extends('layouts.app')

@section('title','Peminjaman Barang')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Peminjaman Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Peminjaman Barang</li>
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
                    <!-- <div class="col-sm-2">
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
                    </div> -->
                    <div class="col-sm-auto">
                        <a href="{{ route('borrows.create') }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-3 rounded float-right">
                            + Pinjam Barang
                        </a>
                    </div>
                </div>
            </div>
            <!-- AKHIR DATE RANGE PICKER -->
            <div class="card-body">
                <div class="card-body table-responsive p-0" style="overflow-x:auto;">
                    <table id="datatablesSimple" class="table table-striped table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Peminjam</th>
                                <th>Nama Barang</th>
                                <th>Merk</th>
                                <th>Agenda</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $a)
                            <tr>
                                <th>{{ $loop->index +1 }}</th>
                                <td>{{ $a->borrower }}</td>
                                <td>{{ $a->item }}</td>
                                <td>{{ $a->merk }}</td>
                                <td>{{ $a->agenda }}</td>
                                <td>{{ date('d M y', strtotime($a->start)) }}</td>
                                @if($a->end == '')
                                <td>-</td>
                                @else ($a->status !== '')
                                <td>{{ date('d M y', strtotime($a->end)) }}</td>
                                @endif
                                <td>
                                
                                @if(($a->start > $now)) 
                                <span class="badge badge-warning"> RENCANA </span>
                                    @elseif ($a->status == 'DIPINJAM') 
                                    <span class="badge badge-danger"> DIPINJAM </span>
                                        @elseif ($a->status == 'KEMBALI')
                                        <span class="badge badge-success"> KEMBALI  </span>
                                           @else
                                                @endif
                                               
                                </td>
                               
                                <td align="right">

                                    @if($a->status == 'DIPINJAM')
                                    <a href="{{ route('borrow.status', $a->id ) }}?status=KEMBALI"
                                        class="btn btn-success btn-sm">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    @endif
                                    @if(Auth::user()->roles == 'ADMIN')
                                    <form action="{{ route('borrows.destroy', $a->id) }}" method="post" class="d-inline"
                                        title="Hapus">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm "
                                            onclick="return confirm('Apakah anda yakin ?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    @elseif(Auth::user()->id == 'ADMIN')
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="border text-center p-5">
                                    Data Tidak Ditemukan
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
            </div>
         
        </div>
        
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset("./dist/js/datatables-simple-demo.js") }}"></script>
@endpush
@push('after-style')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link href="{{ asset("/dist/css/styles.css") }}" rel="stylesheet" />
@endpush
