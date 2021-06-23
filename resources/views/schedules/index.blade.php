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
      <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('schedules.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    + Tambah Jadwal
                </a>
            </div>
          
            <!-- <div class="bg-white"> -->
            <div class="card-body table-responsive p-0" style="overflow-x:auto;">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6 py-4">No</th>
                        <th class="border px-6 py-4">Hari, Tanggal</th>
                        <th class="border px-6 py-4">Waktu</th>
                        <th class="border px-6 py-4">Agenda</th>
                        <th class="border px-6 py-4">Lokasi</th>
                        <th class="border px-6 py-4">Penyelenggara</th>
                        <th class="border px-6 py-4">Peserta</th>
                        <th class="border px-6 py-4">No HP</th>
                        <th class="border px-6 py-4">Lampiran</th>
                        <th class="border px-6 py-4">Keterangan</th>
                        <th class="border px-6 py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($schedule as $data)
                            <tr>
                                <td class="border px-6 py-4">{{ ($schedule->currentPage()-1) * $schedule->perPage()+$loop->index+1 }}</td>
                                <td class="border px-6 py-4 ">{{ $data->date }}</td>
                                <td class="border px-6 py-4">{{ $data->time }}</td>
                                <td class="border px-6 py-4">{{ $data->agenda }}</td>
                                <td class="border px-6 py-4">{{ $data->location }}</td>
                                <td class="border px-6 py-4">{{ $data->organizer }}</td>
                                <td class="border px-6 py-4">{{ $data->participant }}</td>
                                <td class="border px-6 py-4">{{ $data->phone }}</td>
                                <td class="border px-6 py-4">{{ $data->attachment }}</td>
                                <td class="border px-6 py-4">{{ $data->note }}</td>
                                <td class="border px-6 py- text-center">
                                    <a href="{{ route('schedules.edit', $data->id) }}" class="btn btn-success btn-sm" title="Ubah">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('schedules.destroy', $data->id) }}" method="POST" class="d-inline" title="Hapus">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ?')">
                                        <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="10" class="border text-center p-8">
                                   Data Tidak Ditemukan
                               </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $schedule->links() }}
            </div>
        </div>
    



      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection